<?php 

    session_start();
    include_once('conexao.php');


    $data = $_POST;

    //modificações no banco
    if(!empty($data)){
        //print_r($data); exit;
        //criar contato
        if($data["type"]=="create"){
            //echo "criar dado...";
            $nome = $data["nome"];
            $tarefa = $data["tarefa"];
            $obs = $data["obs"];

            $query = "INSERT INTO lista (nome, tarefa, obs)
            VALUES (:nome, :tarefa, :obs)";
            $resultado = $conexao->prepare($query);
            $resultado->bindParam(":nome",$nome);
            $resultado->bindParam(":tarefa",$tarefa);
            $resultado->bindParam(":obs",$obs);
            try{
                $resultado->execute();
                $_SESSION["msg"] = "Tarefa criada com sucesso";
            } catch(PDOException $th){
                echo $th;
            }
        }
    }

        else if($data["type"]==="edit"){
            echo "inicio do edit";
            $nome = $data["nome"];
            $tarefa = $data["tarefa"];
            $obs = $data["obs"];
            $id = $data["id"];
            $print_r($data);echo "<br>";

            $query = "UPDATE lista set nome = :nome, tarefa = :tarefa, obs
             = where id = :id";
            $resultado = $conexao->prepare($query);
            $resultado->bindParam(":nome",$nome);
            $resultado->bindParam(":tarefa",$tarefa);
            $resultado->bindParam(":obs",$obs);
            $resultado->bindParam(":id",$id);
            print_r($resultado);echo "<br>";       
            print_r($query);echo "<br>";  
           
            try {
                $resultado->execute();
                $_SESSION["msg"] = "Tarefa Editada com sucesso.";
            }
            catch(PDO_Execption $th){
                echo $th;
            }
        } else if($data["type"]==="delete"){
            echo "chegou delete";
            $id = $data["id"];
            $query = "DELETE FROM lista WHERE id = :id";
            print_r($resultado);echo "<br>";       
            print_r($query);echo "<br>";
            $resultado->bindParam(":id",$id);
           
            try {
                $resultado->execute();
                $_SESSION["msg"] = "Tarefa Excluída com sucesso.";
            }
            catch(PDO_Execption $th){
                echo $th;
            }
        

    }
    
// echo "chegou aqui";
header('location:../index.php');    else {
        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }
        ///seleção de dados
        //retorna um registro
        if(!empty($id)){
            $query = "SELECT * FROM lista WHERE id = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $tarefa = $stmt->fetch();
        } else {
            //retorna todos os registros
            $query = "SELECT * FROM lista";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $tarefa = [];
            $tarefa = $stmt->fetchAll();
        }
    }

    $conexao = null;

?>