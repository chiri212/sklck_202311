$(function(){
    // 画像プレビュー処理
    $('#image-input').on('change', function (ev) {
        const reader = new FileReader();
        reader.onload = function (ev) {
            $('#image-preview').attr('src', ev.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    })
});
