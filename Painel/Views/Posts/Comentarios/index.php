    <div class="modal-content">
         <h3 class="modal-title" id="closeModalBtn">Comentários</h3>
        <form id="Form_Comentario">
            <input type="hidden" id="mode" name="mode" value="comentario">
            <input type="hidden" id="param1" name="param1" value="">
            <input type="hidden" id="param2" name="param2" value="">
            <div class="form-group">
                <div>
                    <?php
                    
                      #################################################################### texto
                    ?>
                    <div class="input-group input-com-borda">
                        <span class="">Texto do comentário</span>
                        
                        <div id="myNicPanel" style=" width: 70%;" class="col-md-10">
                            <textarea
                                style="height: 100px;"
                                name="comentario_texto"
                                title="Texto do comentário"
                                rows="6"
                                cols="40"
                                id="comentario_texto"
                                ></textarea>
                            <br> <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <button type="button" class="button" style="width: 150px; margin-left: 100px;" id="enviar2">
                Enviar
            </button>
            <div id="div_menssagem" name="div_menssagem" style="margin-left: 20px"></div>
        </form>
        <button class="button" style="width: 150px; margin-left: 100px;" id="fechar_Comentario">
            Fechar
        </button>

    </div>
