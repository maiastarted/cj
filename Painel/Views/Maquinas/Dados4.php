<div class="tab-pane" id="classificacao" style="margin-top: 10px;">

    <div class="row form-group">
        <div class="col-md-8">
            <label>Palavras Chave <i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
            <textarea class="form-control"
                      name = "pchave"
                      rows="5"
                      title = "Informe as Palavras Chave para Pesquisa"
                      required><?php if (!empty($ClienteData['pchave'])) echo htmlspecialchars($ClienteData['pchave']); ?></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label>Categoria 1 <i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
            <select class="form-control" id="cat1" required onchange="buscasubcat(1)">
                <option disabled="disabled" selected="selected">Selecione a Primeira Categoria</option>
                <?php
                $getCategoria1 = new AdminClientes();
                $categorias = new Read;
                $categorias->ExeRead('categorias', 'ORDER BY titulo');
                if ($categorias->getResult()):
                    foreach ($categorias->getResult() as $dados):
                        extract($dados);
                        ?>
                        <option value="<?= $id; ?>" <?php
                        if ($id == $getCategoria1->getCategoria($ClienteData['subCat1'])): $idcat1 = $id;
                            echo 'selected="selected"';
                        endif;
                        ?>> <?= $titulo ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Sub-Categoria 1 <i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
            <div id="subcate1">
                <select class="form-control" name="subCat1" required>
                    <option disabled="disabled" selected="selected">Selecione a Sub-Categoria</option>
                    <?php
                    $SubCategorias = new Read;
                    $SubCategorias->ExeRead('SubCategorias', 'WHERE idCat = ' . $idcat1 . ' ORDER BY titulo');
                    if ($SubCategorias->getResult()):
                        foreach ($SubCategorias->getResult() as $dados):
                            extract($dados);
                            ?>
                            <option value="<?= $id; ?>" <?php if ($id == $ClienteData['subCat1']) echo 'selected="selected"'; ?>> <?= $titulo; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label>Categoria 2</label>
            <select class="form-control" id="cat2" onchange="buscasubcat(2)">
                <option disabled="disabled" selected="selected">Selecione a Segunda Categoria</option>
                <?php
                $getCategoria2 = new AdminClientes();
                $categorias = new Read;
                $categorias->ExeRead('categorias', 'ORDER BY titulo');
                if ($categorias->getResult()):
                    foreach ($categorias->getResult() as $dados):
                        extract($dados);
                        ?>
                        <option value="<?= $id; ?>" <?php
                        if ($id == $getCategoria2->getCategoria($ClienteData['subCat2'])): $idcat2 = $id;
                            echo 'selected="selected"';
                        endif;
                        ?>> <?= $titulo; ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Sub-Categoria 2</label>
            <div id="subcate2">
                <select class="form-control" name="subCat2">
                    <option disabled="disabled" selected="selected">Selecione a Sub-Categoria</option>
                    <?php
                    $SubCategorias = new Read;
                    $SubCategorias->ExeRead('SubCategorias', 'WHERE idCat = ' . $idcat2 . ' ORDER BY titulo');
                    if ($SubCategorias->getResult()):
                        foreach ($SubCategorias->getResult() as $dados):
                            extract($dados);
                            ?>
                            <option value="<?= $id; ?>" <?php if ($id == $ClienteData['subCat2']) echo 'selected="selected"'; ?>> <?= $titulo; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label>Categoria 3</label>
            <select class="form-control" id="cat3" onchange="buscasubcat(3)">
                <option disabled="disabled" selected="selected">Selecione a Terceira Categoria</option>
                <?php
                $getCategoria3 = new AdminClientes();
                $categorias = new Read;
                $categorias->ExeRead('categorias', 'ORDER BY titulo');
                if ($categorias->getResult()):
                    foreach ($categorias->getResult() as $dados):
                        extract($dados);
                        ?>
                        <option value="<?= $id; ?>" <?php
                        if ($id == $getCategoria3->getCategoria($ClienteData['subCat3'])): $idcat3 = $id;
                            echo 'selected="selected"';
                        endif;
                        ?>> <?= $titulo; ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Sub-Categoria 3</label>
            <div id="subcate3">
                <select class="form-control" name="subCat3">
                    <option disabled="disabled" selected="selected">Selecione a Sub-Categoria</option>
                    <?php
                    $SubCategorias = new Read;
                    $SubCategorias->ExeRead('SubCategorias', 'WHERE idCat = ' . $idcat3 . ' ORDER BY titulo');
                    if ($SubCategorias->getResult()):
                        foreach ($SubCategorias->getResult() as $dados):
                            extract($dados);
                            ?>
                            <option value="<?= $id; ?>" <?php if ($id == $ClienteData['subCat3']) echo 'selected="selected"'; ?>> <?= $titulo; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label>Categoria 4</label>
            <select class="form-control" id="cat4" onchange="buscasubcat(4)">
                <option disabled="disabled" selected="selected">Selecione a Quarta Categoria</option>
                <?php
                $getCategoria4 = new AdminClientes();
                $categorias = new Read;
                $categorias->ExeRead('categorias', 'ORDER BY titulo');
                if ($categorias->getResult()):
                    foreach ($categorias->getResult() as $dados):
                        extract($dados);
                        ?>
                        <option value="<?= $id; ?>" <?php
                        if ($id == $getCategoria4->getCategoria($ClienteData['subCat4'])): $idcat4 = $id;
                            echo 'selected="selected"';
                        endif;
                        ?>> <?= $titulo; ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Sub-Categoria 4</label>
            <div id="subcate4">
                <select class="form-control" name="subCat4">
                    <option disabled="disabled" selected="selected">Selecione a Sub-Categoria</option>
                    <?php
                    $SubCategorias = new Read;
                    $SubCategorias->ExeRead('SubCategorias', 'WHERE idCat = ' . $idcat4 . ' ORDER BY titulo');
                    if ($SubCategorias->getResult()):
                        foreach ($SubCategorias->getResult() as $dados):
                            extract($dados);
                            ?>
                            <option value="<?= $id; ?>" <?php if ($id == $ClienteData['subCat4']) echo 'selected="selected"'; ?>> <?= $titulo; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>