<?php
function insert (string $entidade, array $dados) : string
{
$instrucao = "INSERT INTO ($entidade)";
$campos implode(', ', array_keys ($dados)); 
$valores = implode(', ', array_values ($dados));
$instrucao .= "({$campos})";
$instrucao .= " VALUES ({$valores})";
return $instrucao;
}

function update(string $entidade, array $dados, array $criterio = []) : string{
$instrucao = "UPDATE {$entidade}";
foreach($dados as $campo => $dado){
     $set[] = "{$campo} = {$dado}";
}
$instrucao .= ' SET ' . implode (', ' , $set);
if (!empty($criterio)) { 
    $instrucao .= ' WHERE ';
    foreach($criterio as $expressao){
$instrucao .= ' ' . implode (' ', $expressao); 
} 

}

if (!empty($ordem)){
    $instrucao .= "ORDER BY $ordem";
}

return $instrucao;
}


?>