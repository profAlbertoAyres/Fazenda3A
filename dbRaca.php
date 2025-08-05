<?php
   spl_autoload_register(function ($class) {
      require_once "classes/{$class}.class.php";
   });
   //Criando uma instancia da classe Raça
   $raca = new Raca();
if (filter_has_var(INPUT_POST, "btnGravar")):
   $raca->setNome(nome: filter_input(INPUT_POST, "raca", FILTER_SANITIZE_STRING));
   $idRaca = filter_input(INPUT_POST, 'idRaca');
   if (empty($idRaca)):
      if ($raca->add()) {
         echo "<script>window.alert('Raça adicionada com sucesso.');window.location.href='racas.php'</script>";
      } else {
         echo "<script>window.alert('Erro ao adicionar a raça.');window.open(document.referrer,'_self');</script>";
      }
   else:
      if ($raca->update('id_raca', $idRaca)) {
         echo "<script>window.alert('Raça alterada com sucesso.');window.location.href='racas.php';</script>";
      } else {
         echo "<script>window.alert('Erro ao alterar raça.');window.open(document.referrer,'_self');</script>";
      }
   endif;

   elseif(filter_has_var(INPUT_POST,"btnDeletar")):
      $idRaca = intval(filter_input(INPUT_POST,"idRaca"));
      if($raca->delete('id_raca',$idRaca)):
         header("location:racas.php");
      else:
         echo "<script>window.alert('Erro ao excluir');window.open(document.referrer,'_self');</script>";
      endif;
endif;