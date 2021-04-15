<!-- Modal -->
<div class="modal fade" id="confirmaExclusao" tabindex="-1" aria-labelledby="confirmaExclusaoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmaExclusaoLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir <span id="itemTitleModal"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                <a class="btn btn-danger" id="confirmaExclusaoBtnSim">Sim</a>
            </div>
        </div>
    </div>
</div>

@section('javascript')
    <script>
        $('#confirmaExclusao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var itemTitle = button.data('item-title');
            var itemId = button.data('item-id');

            var modal = $(this);
            modal.find('#itemTitleModal').text(itemTitle);
            modal.find('#confirmaExclusaoBtnSim').attr('href', $('#baseUrlCurrentPage').val() + '/' + itemId + '/delete');
        });
    </script>
@endsection
