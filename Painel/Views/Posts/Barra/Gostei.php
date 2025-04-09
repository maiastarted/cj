<?php


// Verifica se a requisição é POST e recebe os dados JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $postId = $input['post_id'];
    
    if ($postId) {
        // Atualiza os likes no banco de dados
        $query = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $postId);
        
        if ($stmt->execute()) {
            // Obtém o novo número de likes
            $result = $conn->query("SELECT likes FROM posts WHERE id = $postId");
            $row = $result->fetch_assoc();
            
            echo json_encode([
                'success' => true,
                'like_count' => $row['likes']
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Erro ao atualizar os likes.'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'ID do post não fornecido.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método inválido.'
    ]);
}

?>
<script>


// Envia a requisição AJAX para o servidor
        fetch('Painel/Views/Posts/Modal/Crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({post_id: postId}),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Atualiza o contador de likes
                    likeCountElement.textContent = data.like_count;
                    console.log('Like registrado com sucesso!');
                } else {
                    console.error('Erro ao registrar like:', data.message);
                }
            })
            .catch((error) => {
                console.error('Erro na requisição:', error);
            });
    });
</script>