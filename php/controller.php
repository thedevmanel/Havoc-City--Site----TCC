<?php

class Database
{
    private $conn; // variavel usada para todas as funções
    private $tblu; // tabela 1 da db
    private $tblg; // tabela 2 da db
    private $name_adm; // email do adm
    private $pass_adm; // senha para o adm

    public function __construct()
    {
        $config = include('config.php');

        $this->connection(
            $config['hostname'],
            $config['database'],
            $config['username'],
            $config['password']
        );
        
        // tables
        $this->tblu = $config['tbl_1u'];
        $this->tblg = $config['tbl_2g'];
        
        // columns
        

        // logins
        $this->name_adm = $config['name_adm'];
        $this->pass_adm = $config['pass_adm'];
    }

    // função para a conexão do banco de dados
    public function connection(string $hostname, string $database, string $username, string $password)
    {
        $this->conn = new PDO(
            "pgsql:host=$hostname;port=5432;dbname=$database",
            $username,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    // função para inserir o formulario enviado pelo usuario
    public function insertDataUsers(string $id_user, string $name, string $nickname, string $email, string $password)
    {
        $query = "INSERT INTO {$this->tblu} VALUES (:id_user, :name_user, :nickname, :email, :password_user, true)"; // query com marcadores de posição para o insert
        $stmt = $this->conn->prepare($query); // prepara para poder executar depois
        $stmt->execute([
            ':id_user' => $id_user,
            ':name_user' => $name,
            ':nickname' => $nickname,
            ':email' => $email,
            ':password_user' => $password
        ]); // execução da inserção
    }

    // função para selecionar os dados de email do usuario
    public function verifyRegister(string $nickname, string $email)
    {
        $query = "SELECT nickname, email FROM {$this->tblu} WHERE nickname = :nickname OR email = :email"; // query com marcadores de posição para o select
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':nickname' => $nickname,
            ':email' =>  $email
        ]);

        return $stmt;
    }

    // função para a execução do login (seleção de email e senha)
    public function selectDataUser(string $email, string $password)
    {
        $query = "SELECT * FROM {$this->tblu} WHERE user_status = true OR password = :password_user OR email = :email"; // query com marcadores de posição para o select
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':password_user' => $password
        ]);

        return $stmt;
    }

    // função para a verificação de Id
    public function verifyIdUser(string $id_user)
    {
        $query = "SELECT * FROM {$this->tblu} WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt;
    }

    // função para o recorde de tempo
    public function timeRecords()
    {
        $query = "SELECT u.nickname, g.game_time, g.game_points FROM {$this->tblu} u JOIN {$this->tblg} g ON u.id_user = g.id_user WHERE g.status = true ORDER BY g.game_time ASC, g.game_points;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // função para o recorde de pontos
    public function pointsRecords()
    {
        $query = "SELECT u.nickname, g.game_time, g.game_points FROM {$this->tblu} u JOIN {$this->tblg} g ON u.id_user = g.id_user WHERE g.status = true ORDER BY g.game_points DESC, g.game_time";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // função utilizada para excluir/editar usuários
    public function selectPassword(string $id_user, string $password)
    {
        $query = "SELECT password, id_user FROM {$this->tblu} WHERE id_user = :id_user OR password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id_user' => $id_user,
            ':password' => $password
        ]);

        return $stmt;
    }

    // função para a "exclusão" de usuários
    public function deleteUsers(string $id_user)
    {
        $query = "UPDATE {$this->tblg} SET status = false WHERE id_user = :id_user";
        $stmt1 = $this->conn->prepare($query);
        $stmt1->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt1->execute();

        $query = "UPDATE {$this->tblu} SET user_status = false WHERE id_user = :id_user";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt2->execute();
    }

    // função para executar o login de adm
    public function selectAdm(string $email, string $password)
    {
        if (($email == "{$this->name_adm}") && ($password == "{$this->pass_adm}")) {
            $_SESSION['logged_adm'] = $email;
            header("Location:http://localhost:3000/adm_page.php");
        } else {
            echo "$email <br /> $password <br /> deu erro";
        }
    }

    // irá ordernar de forma para acertar os usuarios
    public function admOrderUsers()
    {
        $query = "SELECT u.*, g.* FROM {$this->tblu} u JOIN {$this->tblg} g ON u.id_user = g.id_user ORDER BY u.nickname ASC, g.game_time ASC, g.game_points ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // pega a quantidade de colunas da tabela de usuarios
    public function admCountUsers()
    {
        $query = "SELECT COUNT(*) AS number_line FROM {$this->tblu}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // pega a quantidade de colunas nas tabela do jogo
    public function admCountGameStats()
    {
        $query = "SELECT COUNT(*) AS number_line FROM {$this->tblg}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // função para média de horas de jogos
    public function admAvarageHours()
    {
        $query = "SELECT TO_CHAR(INTERVAL '1 second' * AVG(EXTRACT(EPOCH FROM game_time)), 'HH24:MI:SS') AS avg_hours FROM {$this->tblg}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // funcao para excluir jogadores
    public function admDeleteGameStats(string $id_game)
    {
        $query = "DELETE FROM {$this->tblg} WHERE id_game = :id_game";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('id_game', $id_game, PDO::PARAM_STR);
        $stmt->execute();
    }

    // função para inserir o save do jogo no banco de dados
    public function saveGame(string $game_time, float $game_points, string $id_user)
    {
        $query = "INSERT INTO {$this->tblg} VALUES (DEFAULT, :game_time, :game_points, :id_user, true)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':game_time', $game_time,
            ':game_points', $game_points,
            ':id_user', $id_user
        ]);
    }

    // função para adicionar a edição de usuários
    public function updateUsers(string $id_user, string $name, string $email, string $nickname, string $password)
    {
        $query = "UPDATE {$this->tblu} SET name = :name, nickname = :nickname, email = :email, password = :password WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id_user' => $id_user,
            ':name' => $name,
            ':nickname' => $nickname,
            ':email' => $email,
            ':password' => $password
        ]);

        header('Location: http://localhost:3000/usuario.php?id=' . urlencode(':id_user'));
    }

    // função para selecionar tudo do usuário para a edição
    public function selectAllFromUsers()
    {
        $query = "SELECT * FROM {$this->tblu}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // função para gerar a chave para as senhas esquecidas
    public function forgotPassword(string $email) {
        $query = "SELECT id_user, email, name FROM {$this->tblu} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt;
    }

    // função para colocar a chave no banco de dados
    public function updateKeyPass(string $id_user, string $key_pass) {
        $query = "UPDATE {$this->tblu} SET key_forgot_password_webhc = :key_pass WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id_user' => $id_user, 
            ':key_pass' => $key_pass
        ]);

    }

    // função para validar se a chave é verdadeira
    public function validateKeyPass(string $key_pass) {
        $query = "SELECT key_forgot_password_webhc FROM {$this->tblu} WHERE key_forgot_password_webhc = :key_pass";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':key_pass' => $key_pass 
        ]);

        return $stmt; 
    }

    // função para adicionar a nova senha
    public function updatePassword(string $password, string $key_pass) {
        $query = "UPDATE {$this->tblu} SET key_forgot_password_webhc = NULL, password = :password WHERE key_forgot_password_webhc = :key_pass";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':password' => $password,
            ':key_pass' => $key_pass
        ]); 

        return $stmt;
    }
}

class webSite
{
    public function loginStatus($login_user, $login_adm, $url_user)
    {
        echo $login_user ? '<li><a href="' . $url_user . '"> perfil </a></li> </ul>'
            : ($login_adm ? '<li><a href="adm_page.php"> admin </a></li> </ul>' :

                // Se não estiver logado
                '<li><a href="entrar.php">iniciar sessao</a></li>
            </ul>
            ');
    }
}
