{extends 'layout.tpl'}
{block name=content}
    <h2 class="text-center"> Page Teste </h2>

    {$index = 0}
    {foreach $keys as $key}
        <p align="center"> Aperte confirmar pra testar o serviço = {$key} - > {$values[$index]} </p>
        {$index = $index + 1} 
    {/foreach}
    <form method="POST" action="{base_url}/store-teste-servico">  
        <nav aria-label="navigation" class="pagination justify-content-center">
            <button style="margin-top: 2%; width: 300px; height: 45px" class="btn btn-outline-dark" type="submit">Confirmar</button>  
        </nav>
    </form>

{/block}