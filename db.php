<?php

class Alunos {
    private $conn;   
    private $host = "mysql.jrcf.dev";
    private $db = "escola";
    private $user = "usrapp";
    private $pass = "010203";
    
    public function __construct() {
        // Criar conexão com o banco de dados
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Verificar se houve erro na conexão
        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }
    
    // Método para adicionar um novo aluno
    public function adicionarAlunos($nome, $email) {
        $sql = "INSERT INTO alunos (nome, email) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $email);
            if ($stmt->execute()) {
                echo "Aluno adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    public function adicionarDisciplina($nome, $carga_horaria) {
        $sql = "INSERT INTO disciplinas (nome, carga_horaria) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $carga_horaria);
            if ($stmt->execute()) {
                echo "Disciplina adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar a disciplina: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    public function adicionarAvaliacao($aluno_id, $disciplina_id, $nota, $data_avaliacao) {
        $sql = "INSERT INTO disciplinas (aluno_id, disciplina_id, nota, data_avaliacao) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $aluno_id, $disciplina_id, $nota, $data_avaliacao);
            if ($stmt->execute()) {
                echo "Nota da avaliaçãp adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar a nota da Avaliação: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para listar todos os alunos
    public function listarAlunos() {
        $sql = "SELECT * FROM alunos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $alunos = [];
            while ($row = $result->fetch_assoc()) {
                $alunos[] = $row;
            }
            return $alunos;
        } else {
            return [];
        }
    }

    // Método para alterar um aluno
    public function alterarAlunos($id, $nome, $email) {
        $sql = "UPDATE alunos SET nome = ?, email = ? WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii", $nome, $email, $id);
            if ($stmt->execute()) {
                echo "Aluno atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para excluir um Aluno
    public function excluirAluno($id) {
        $sql = "DELETE FROM alunos WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Aluno excluído com sucesso!";
            } else {
                echo "Erro ao excluir o aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Fechar a conexão com o banco de dados
    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
