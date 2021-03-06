{extends 'layout.tpl'}
{block name=content}
<h2 class="text-center"> Avaliação </h2>
    <hr>
        <div align="center">
          <div class="col-md-8 col-sm-12" style="border: 0.5px solid;  width: 100%; height: 70px; margin-bottom: 2%; margin-top: 2%; display: flex;  justify-content: center; align-items: center;">
              {if (isset($codigo) || isset($disciplina))}
                <p align="center" class="font-italic col-sm-12" style="font-size: 20px; font-weight: 500;">{$codigo} - {$disciplina}</p>
              {/if}
          </div>
        </div>
        <p style="margin-left: 10%; font-weight: 700; font-size: 29px"> Avaliação da turma</p>
        <p style="margin-left: 10%; font-weight: 700; margin-bottom: 4%; font-size: 17px">*Faça sua avaliação, sendo 1 [Discordo Totalmente] e 5 [Concordo Totalmente].</p>

        <div align="center" style="margin-bottom: 4%;">
          {if isset($incompleto)}
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {$incompleto}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          {/if}
        </div>

  <div style="margin-left:10%; margin-bottom: 5% ">           <!-- DIV PRINCIPAL -->
    <div style="margin-bottom: 3%">
      <div style=" font-size: 20px">
        <form method="POST" action="{base_url}/store-avaliacao-3">    <!-- Começa o formulario -->
      
          <input type="hidden" name="codigo" value="{$codigo}">
          <input type="hidden" name="disciplina" value="{$disciplina}">
          <input type="hidden" name="id_disciplina" value="{$id_disciplina}">
          <input type="hidden" name="verificacao" value="{$verificacao}">   
          
          {foreach $respostas1_2 as $r}
            <input type="hidden" name="respostas1_2[]" value="{$r}">
          {/foreach}

          {foreach $questoes3 as $questao}

            {$numero = $questaoQuestionarioDAO->getNumeroQuestao($versaoAtual, $questao->getId())}
            
            <p style=" font-size: 20px; margin-top: 4%"> {$numero}- {$questao->getEnunciado()}</p> 
            
            {if $questao->getTipo() == 0 }
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio1{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="1">
                <label class="custom-control-label" for="radio1{$numero}">1</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio2{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="2">
                <label class="custom-control-label" for="radio2{$numero}">2</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio3{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="3">
                <label class="custom-control-label" for="radio3{$numero}">3</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio4{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="4">
                <label class="custom-control-label" for="radio4{$numero}">4</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio5{$numero}" name="customRadio3_{$numero}" class="custom-control-input"  value="5">
                <label class="custom-control-label" for="radio5{$numero}">5</label>
              </div>


            {/if}

            {if $questao->getTipo() == 1 }
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio1{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="1">
                <label class="custom-control-label" for="radio1{$numero}">Sim</label>
              </div>
               <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radio2{$numero}" name="customRadio3_{$numero}" class="custom-control-input" value="0">
                <label class="custom-control-label" for="radio2{$numero}">Não</label>
              </div>

            {else}

            {/if}
          {/foreach}
      </div>
    </div>    
</div>
    <hr/>  
    <nav aria-label="navigation" class="pagination justify-content-center">
        <button style="margin-top: 2%; width: 300px; height: 45px" class="btn btn-success" type="submit">Enviar</button>  
      </form>
    </nav>
    

{/block}