
{extends 'basepage.tpl'}

{block name = "lateral" }             
<section>
			<center>
				<h1>Página do Aluno</h1>
				<button onclick="window.location='pagAluno.php';"> Perfil</button>
				<form action="router.php" method="post" enctype="multipart/form-data">
				<input type="submit" value="Alterar Dados" name="submit"><br>
				<input type="submit" value="Enviar Certificados" name="submit"><br>
				<input type="submit" value="Trocar Perfil" name="submit"><br>
				<br><input type="submit" value="Logout" id="logout" name="submit">
				</form>		
			</center>
				
				
</section> 
{/block}

{block name = "mid" } 
        <script LANGUAGE="JavaScript">
          function define_operacao(operacao){
            if (operacao == "alt") {
               document.form_alteracao_exclusao_receitas.form_operacao.value = "alteracao";
            }
            if (operacao == "exc") {
               document.form_alteracao_exclusao_receitas.form_operacao.value = "exclusao";
            }
            document.form_alteracao_exclusao_receitas.submit();
          }
          </script>

<center>
			<div id="content">
            <div class="innertube">
            <h1>Descrição:</h1>
            <p>&nbsp;</p>
            <p><strong>Aluno</strong></p>
            <p>&nbsp;</p>
            <form method="POST" action="alterar.php" name="form_alteracao_exclusao_receitas">
            <table width="600">
			<tr>
			<td class="td_r">Senha atual:</td>
			<td>
			  <input name="senhaA" type="password" id="senhaA" size="30" maxlength="30" required="required" value="">*
			</td>
		  </tr>
			<tr>
			<td class="td_r">Nova senha:</td>
			<td>
			  <input name="senhaN" type="password" id="senhaN" size="30" maxlength="30" required="required" value="">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Repita a senha:</td>
			<td>
			  <input name="senhaC" type="password" id="senhaC" size="30" maxlength="30" required="required" value="">*
			</td>
		  </tr>
		  <tr>
			<td colspan='2'class="td_c">* dados obrigatórios 
			</td>
		  </tr>
		  <tr>
			<td colspan='2' class="td_c">
			  <input type="hidden" name="form_operacao" value="consulta">
			  <center><input name="alterar" type="button" value="Alterar" onClick="define_operacao('alt');"></center>

			</td>
		  </tr>
		  </table>
	  </form>
	  </center>{/block}