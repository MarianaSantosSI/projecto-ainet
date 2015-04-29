<?php namespace Ainet\Models;

class User
{
    public $id;
    public $email;
    public $password;
    public $fullname;
    public $registeredAt;
    public $type;

    public function __construct($id=null, $email=null, $password=null, $fullname=null, $type=null, $registeredAt=null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->registeredAt = $registeredAt;
        $this->type = $type;
    }

    public static function all()
    {
        return [
            1 => new User(1, 'ktorp@gmail.com', '$2y$10$Mq/OxdBTA73g7ok5J9cE.OoYSLLZlLALc/mic3eOR6VfUNmjJOZr2', 'Cassandre Greenholt', 0, '1982-04-29 03:22:51'),
            2 => new User(2, 'skyla75@gmail.com', '$2y$10$2/tHKPbZlAB7p6c.eHaVWeyzv46eN7BU30g/b62n7W3.vIpMPS7bi', 'Arianna Ferry', 0, '1989-06-02 12:45:51'),
            3 => new User(3, 'bartoletti.denis@hotmail.com', '$2y$10$a3WSXwdEnVzQoeYJMDwkRegUmAmTO5SYTI7DQhTL9MpRqPMUcphtq', 'Nayeli Morar', 1, '2000-05-30 22:55:44'),
            4 => new User(4, 'gregg.kautzer@yahoo.com', '$2y$10$cDx3wHXcNjvH50mrfbRVWeV4hb7OLL2JWoluvyoYAz.H9wcQqvBmK', 'Zetta Leannon', 0, '1971-05-14 01:02:16'),
            5 => new User(5, 'hjerde@kuhic.biz', '$2y$10$Y.ZAqs1T4TmJm9CTgYyzcu./1ZspcNNH9FZ6BbIiQ10U/DImbXIdy', 'Joelle Funk', 1, '2004-05-10 13:07:37'),
            6 => new User(6, 'daphne.schuppe@torphy.com', '$2y$10$j9QdUUcrj5Dakro/n/FMkurXbKS4YCDBBooArkPBcu0aAyojGV6D6', 'Kathleen Gleichner', 2, '1973-10-11 03:09:03'),
            7 => new User(7, 'fjacobi@yahoo.com', '$2y$10$dhzFGjF2pJATGXzSsyTHZu2EJGxbwyMUQ9SBG9uklsn99ZRsk6NQ2', 'Otha O\'Connell', 0, '1999-03-21 17:05:29'),
            8 => new User(8, 'evans35@moore.com', '$2y$10$WgmE7qmsLPedzGyp41sjDO1DmVM/XB5deCnsH9y7UIm1Ll2Sm.ODW', 'Callie Romaguera', 2, '1989-12-29 01:24:29'),
            9 => new User(9, 'raquel30@gmail.com', '$2y$10$zDGaW2Xv4olsqRCA9SDv0urkCA2T931jPvXu/k8nr/.lTQOsKwdK2', 'Cruz Rau', 1, '2000-11-20 22:49:20'),
            10 => new User(10, 'trystan.donnelly@farrell.net', '$2y$10$YwuPqRLEOgY9M/NsDu4LFuj.Ae6dxeLdGQU/gxrueHHrmK9SzV98K', 'Desiree Sipes', 0, '1987-08-11 23:37:52')
        ];
    }

    public static function find($id)
    {
        $users = self::all();
        if (array_key_exists($id, $users)) {
            return $users[$id];
        }
        return null;
    }

    public static function findByEmail($email)
    {
        $users = self::all();
        foreach ($users as $id => $user) {      // compara para par (User + Id)
            if ($user->email==$email) {         // percorre tds Users e vê se email inserido existe em algum User
                return $user;
            }
        }
        if (array_key_exists($email, $users)) {
            return $users[$email];
        }
        return null;
    }

    public static function add($user)
    {
        // inserir na BD
        header('Location: http://192.168.56.101/ficha06/users.php');
        exit(0);
    }

    public static function save($user)
    {
        var_dump($user);
        die("UPDATE STATEMENT HERE");
    }

    public static function delete($id)
    {
        var_dump($id);
        die("DELETE STATEMENT HERE");
    }
}