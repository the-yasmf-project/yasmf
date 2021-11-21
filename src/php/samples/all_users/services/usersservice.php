<?php


namespace services;

use PDOException;

class UsersService
{
    /**
     * @param $pdo \PDO the pdo object
     * @param $likeUsername String the string the username should contain
     * @param $statusId Int the status id
     * @return \PDOStatement the statement referencing the result set
     */
    public function findUsersByUsernameAndStatus($pdo, $likeUsername, $statusId)
    {
        $sql = "select users.id as user_id, username, email, s.name as status, s.id as status_id 
            from users join status s on users.status_id = s.id 
            where username like :likeUsername and status_id = :statusId order by username";
        $searchStmt = $pdo->prepare($sql);
        $searchStmt->execute(['likeUsername' => $likeUsername, 'statusId' => $statusId]);
        return $searchStmt;
    }


    private static $defaultUsersService ;
    public static function getDefaultUsersService()
    {
        if (UsersService::$defaultUsersService == null) {
            UsersService::$defaultUsersService = new UsersService();
        }
        return UsersService::$defaultUsersService;
    }
}