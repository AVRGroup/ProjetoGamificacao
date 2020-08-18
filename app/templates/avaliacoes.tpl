{extends 'layout.tpl'}
{block name=content}
    <h2 class="text-center"> Avaliação </h2>
    <hr>
    {if isset($concluiu)}
        <div align="center" >
            <h3> Nada por aqui! </h3>
            <h5 class="font-italic"> Você já concluiu todas as avaliações </h5 style="font-italic">
        </div>
    {else}
        <p align="center" class="font-italic" style="font-size: 24px;"> Selecione uma disciplina para avaliar </p>
    {/if}
    
    {if isset($completo)}
        <div align="center" style="margin-bottom: 3%;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {$completo}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    {/if}

    <div class="container ">
        <div align="center" class="col-lg-12 col-sm-12 col-md-12" >
            <div class="container">
                    {foreach $disciplinas_aluno as $disciplina}
                    {$show = true}    
                        <div class="container">    
                            {foreach $disciplinas_avaliadas as $disci}
                                {if $disci == $disciplina->getId()}
                                    <button type="button" class="btn btn-lg btn-primary col-lg-6 col-sm-12 col-md-12 text-truncate" style="margin-top: 1%" disabled> {$disciplina->getCodigo()} - {$disciplina->getNome()}</button>
                                        {$show = false}
                                    {break}
                                {/if}
                            {/foreach}
                            {if $show}
                                <a href="{path_for name="avaliacaoPage01"}?param={$disciplina->getId()}/{$turma[$disciplina->getCodigo()]}/{$discAvaliacao}" class="text-truncate btn btn-primary btn-lg active col-lg-6 col-sm-12 col-md-12" style="margin-top: 1%" role="button" aria-pressed="true"> {$disciplina->getCodigo()} - {$disciplina->getNome()}</a>
                            {/if}
                        </div>
                    {/foreach}
                <hr>
            </div>
        </div>
    </div>

    <form method="POST" action="{path_for name="home"}">  
        <nav aria-label="navigation" class="pagination justify-content-center">
            <button style="margin-top: 2%; width: 300px; height: 45px" class="btn btn-outline-primary" type="submit">Página inicial</button>  
        </nav>
    </form>
{/block}