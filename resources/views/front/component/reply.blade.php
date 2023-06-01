    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('reply.submit') }}" method="get" novalidate="novalidate">
                        @csrf
                        <input class="form-control" name="_token" id="_token" type="hidden" value="{{csrf_token()}}">
                        <input class="comment_id" type="hidden" id="comment_id" name="comment_id">

                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre*</label>
                            <input style="height: 40px !important;" type="text" class="form-control" name="name"  type="text" onfocus="this.placeholder = ''"onblur="this.placeholder = 'Nombre y Apellido'" placeholder='Nombre y Apellido' required>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-form-label">Email*</label>
                            <input style="height: 40px !important;" class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Correo Electronico'" placeholder='Correo Electronico' required>
                          </div>
                          <div class="form-group">
                            <label for="cell" class="col-form-label">Celular</label>
                            <input style="height: 40px !important;" class="form-control" name="cell" id="cell" type="tel" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{4}" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Teléfono Celular'" placeholder='Teléfono Celular' id="cell">
                          </div>
                          <div class="form-group">
                            <label for="web" class="col-form-label">Website</label>
                            <input style="height: 40px !important;" class="form-control" name="website" type="url" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Página Web'" placeholder='Página Web' id="web">
                          </div>
                          <div class="form-group">
                            <label for="message-comment" class="col-form-label">Comentario*</label>
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingrese su mensaje'" placeholder='Ingrese su mensaje' required></textarea>
                          </div>
                                               
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Publicar Comentario</button>
                </div>
            </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.comment_id').val(recipient)
        })

    </script>
