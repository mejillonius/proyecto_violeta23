<?PHP

echo(LOADDEBUG?"Debug loader BaseMysql <br> ":"");

class BaseMysql extends PDO
{
    private $typedb = "mysql";
    private $host = "sql108.byethost18.com";
    private $namedb = "b18_34084760_presentacion;charset=utf8mb4";
    private $user = "b18_34084760";
    private $pw = "mejillon1";

    public function __construct()
    {

        try {
            parent::__construct($this->typedb . ":host=" . $this->host . ";dbname=" . $this->namedb, $this->user, $this->pw);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}