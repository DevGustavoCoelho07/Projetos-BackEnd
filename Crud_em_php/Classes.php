<?php 
class PdoConnect {
    
    private static $pdo;
    public static function conectar(){
        if(self::$pdo == null){
 try{
        self::$pdo = new PDO("mysql:host=localhost;dbname=db_teste",'root','');
        }catch(Exception $e){
            echo 'Falha na conexão';
        }
            
            
    }
    return self::$pdo;
}
    
}


class Create
{
    public static function Inserir(){
        
        
        if(isset($_POST['insere-dados'])){
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
         
            $sql = PdoConnect::conectar()->prepare('INSERT INTO `tb_users.crud` values (null,?,?)');
            $sql->execute(array($nome,$idade));
         }
    }

}

class Read
{
    public static function listarDados () {

        $sql = PdoConnect::conectar()->prepare('SELECT * FROM `tb_users.crud`');
        $sql->execute();
        
        while ($cadastrados = $sql->fetch(PDO::FETCH_ASSOC)) {
            
            echo '<br><hr></hr>Nome   |'.$cadastrados['nome']. "|";
         
            echo "IDADE: " .$cadastrados['idade'] .
            "<a href='editar.php?id=".$cadastrados['id']. "'><button id='btn-editar'>Editar</button></a>"."<a href='?id=".$cadastrados['id']. "'><button id='btn-delete'>Deletar</button></a>". "<br><hr></hr>";
        
        }

    }
}

Class Delete {
    public static function deletarDados(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = PdoConnect::conectar()->prepare('DELETE from `tb_users.crud` WHERE id=? ');
            $sql->execute(array($id));
        }
    }
}
Class Update{
    public static function salvarDados(){
       
        if(isset($_POST['atualiza-dados'])){
    
            $id = $_POST['id']; 
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
        
            $sql = PdoConnect::conectar()->prepare('UPDATE `tb_users.crud` set nome = ? , idade = ? where id=? ');
            $sql->execute(array($nome,$idade,$id));
            
            }
      
    }  

    public static function preencherCampos (){

        if(isset($_GET['id'])){
          
            $_SESSION['id'] = $_GET['id'];
            $id = $_SESSION['id'];
            $sql = PdoConnect::conectar()->prepare('SELECT * from `tb_users.crud` WHERE id=? ');
            $sql->execute(array($id));
        
        //verificar se a query retornou uma id
        if($sql->rowCount() > 0){
        
            while ($cadastrados = $sql->fetch(PDO::FETCH_ASSOC)) {
            //definindo variaveis aos indices do loop que serão utilizados para preencher os campos do formulário
           $_SESSION['nome'] = $cadastrados['nome'];
            $_SESSION['idade'] = $cadastrados['idade'];
        
                
        }
            }
        
        }
    }


}


?>