<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Receipt.php';

class ReceiptRepository extends Repository
{
    public function getReceipts(): array
    {
        $id_user = $_SESSION['id_user'];
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT public.receipts.*, user_details.image, user_details.name, user_details.surname, receipts_users.paid
            FROM receipts inner join receipts_users on receipts.id=receipts_users.id_receipt inner join users on
            users.id=receipts.id_creator inner join user_details on users.id_user_details=user_details.id
            WHERE receipts_users.id_user = :id_user ORDER BY creation_date DESC
        ');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        $receipts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($receipts)) {
            return array();
        }

        foreach ($receipts as $receipt) {
            $result[] = new Receipt(
                $receipt['amount'],
                $receipt['id_creator'],
                $receipt['text'],
                $receipt['creation_date'],
                $receipt['image'],
                $receipt['num_of_users']+1,
                $receipt['name'],
                $receipt['surname'],
                $receipt['paid']
            );
        }
        return $result;
    }

    public function addReceipt(Receipt $receipt): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO receipts (amount, id_creator, text, creation_date, num_of_users)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $receipt->getAmount(),
            $receipt->getIdCreator(),
            $receipt->getText(),
            $receipt->getCreationDate(),
            $receipt->getNumOfUsers()
        ]);

        $stmt = $this->database->connect()->prepare('
        SELECT receipts.id FROM receipts WHERE id=(SELECT max(id) FROM receipts)
        ');

        $stmt->execute();
        $id_receipt=intval($stmt->fetch(PDO::FETCH_ASSOC)['id']);

        $usersGroup = $_SESSION['usersGroup'];
        $i=0;
        foreach($receipt->getName() as $userChecked){
            if($userChecked=="on"){
                $stmt = $this->database->connect()->prepare('
            INSERT INTO receipts_users (id_user, id_receipt)
            VALUES (?, ?)
                ');

                $stmt->execute([
                    $usersGroup[$i]->getId(),
                    $id_receipt
                ]);
            }
            $i = $i+1;
        }

    }

}