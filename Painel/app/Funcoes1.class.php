<?php


function monta_Array($dados)
{
    switch ($dados) {
        case 'data':
            $dados = 13;
            break;

        case '':
            $dados = 14;
            break;

        case '':
            $dados = 15;
            break;

        case '':
            $dados = 17;
            break;

        case '':
            $dados = 18;
            break;

        case 'cilindoMaisSoloUmido':
            $dados = 19;
            break;

        case 'massaDoCilindro':
            $dados = 20;
            break;

        case 'massaDoSoloUmido':
            $dados = 21;
            break;

        case '':
            $dados = 22;
            break;

        case '':
            $dados = 23;
            break;

        case 'densidadeUmidaDoCampo':
            $dados = 24;
            break;

        case '':
            $dados = 25;
            break;
        case '':
            $dados = 26;
            break;
        case '':
            $dados = 29;
            break;
        case 'Latitude':
            $dados = 14;
            break;
        case 'posicao':
            $dados = 14;
            break;

// 
// 
// 
// 203
// Longitude
// 204
// densidadeMaxSecaDeLab
// 205
// umidadeDeCampo
    }
    return $dados;

}
