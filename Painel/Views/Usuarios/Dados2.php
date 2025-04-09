<div class="tab-pane active" id="logos" style="margin-top: 10px;">
    <div class="row form-group">
        <div class="input-group input-com-borda">
            <div class="input-group ">
                <a href="#"
                   class="thumbnail"
                   onclick="document.getElementById('upload1').click(); return false">
                    <?php
                        if ($tipo != 'Novo') {
                            echo Check::ImageUserAvatar($avatar1);
                        }
                    ?>
                </a>
            </div>

            <div class="input-group ">
                <input class="form-control"
                       id="upload1"
                       type="file"
                       name="avatar"/>
            </div>
            <p>Tamanho Máximo/Ideal: 250 pixels x 170 pixels</p>

            <span class="texto-acima-borda">Avatar</span>
        </div>
    </div>
</div>
