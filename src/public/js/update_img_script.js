
// image confirmation script
  document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    } else {
      // ファイル選択をキャンセルした場合は非表示にする
      preview.src = '';
      preview.style.display = 'none';
    }
  });
