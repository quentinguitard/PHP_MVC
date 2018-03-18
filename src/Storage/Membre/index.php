
<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col">
        <form method='post' action='/PiePHP/membre'>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="User Email" name='email'>
                <div class="input-group-append">
                    <button type='submit' class="btn btn-outline-secondary" type="button"><i class="fas fa-search 3x"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <table class="table background-white-light table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($membreList as $values): ?>
               
                <tr>
                    <th scope="row"><?= htmlspecialchars($values['id_membre']) ?></th>
                    <td><?= htmlspecialchars($values['nomUser']) ?></a></td>
                    <td><?= htmlspecialchars($values['prenomUser']) ?></td>
                    <td><?= htmlspecialchars($values['email']) ?></td>
                    <td> <a href="/PiePHP/membre/info?id_membre=<?= htmlspecialchars($values['id_membre']) ?>" class="text-dark">More info</a> </td>
                </tr>
                </a>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example " >
<?php
$page_before_after = 4;
$pagination = "";
if($nb_pages != 1){
	if($page > 1){
	    $previous = $page - 1;
		$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/membre?page=".$previous."'>Previous</a></li>";
		
        for($i = $page - $page_before_after; $i < $page; $i++){
            if($i > 0){
                $pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/membre?page=".$i."'>".$i."</a></li>";
            }
        }
	}
}
$pagination .= "<li class='page-item disabled'><a class='page-link text-muted' href='#'>".$page." </a></li>";

	for($i=$page + 1; $i <= $nb_pages; $i++){
	$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/membre?page=".$i."'>".$i."</a></li> ";
		if($i >= $page + $page_before_after){
			break;
		}
	}
	if($page != $nb_pages){
	$next = $page +1;
	$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/membre?page=".$next."'>next</a></li>";
	}

echo "<ul class='pagination justify-content-center'>".$pagination."</ul>";

?>
    </nav>
</div>