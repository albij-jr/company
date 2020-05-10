<script>
    function onDeleteButton(id) {
        $('#js_company_id').val(id);
    }
    $(document).ready(() => {
        $("#image-holder-img").click(() => {
            $("#logo").click();
        })
    });
        $('#logo').change(function(){
            var input=this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#image-holder-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                $('#image-holder-img').attr('src', '/assets/images/no-image.jpg');
            }
        });
</script>
