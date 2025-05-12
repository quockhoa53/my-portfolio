<script src="https://cdn.tiny.cloud/1/9cod5oausc5mgohil7pgsnjz39faxvcjx4or9bvwnr7s6pre/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo TinyMCE cho chỉnh sửa profile
    tinymce.init({
        selector: 'textarea#profile_content',
        plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
    ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    tinymce.init({
    selector: 'textarea#project_content',
    plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => {
        respondWith(Promise.reject('See docs to implement AI Assistant'));
    },
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
    images_upload_url: '/upload-handler',
    images_upload_handler: function (blobInfo, success, failure) {
        window.onload = function() {
            var xhr = new XMLHttpRequest();
            var formData = new FormData();
            xhr.withCredentials = false;
            xhr.open('POST', '/upload-handler');
            var csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken.getAttribute('content'));
            } else {
                console.error('Thẻ meta CSRF token không tìm thấy!');
            }
            xhr.onload = function() {
                var json;
                if (xhr.status !== 200) {
                    failure('Lỗi HTTP: ' + xhr.status);
                    return;
                }
                try {
                    json = JSON.parse(xhr.responseText);
                } catch (error) {
                    failure('Dữ liệu JSON không hợp lệ: ' + xhr.responseText);
                    return;
                }
                if (!json || typeof json.location !== 'string') {
                    failure('Dữ liệu JSON không hợp lệ: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            xhr.onerror = function() {
                failure('Lỗi tải ảnh do sự cố mạng.');
            };
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        };
    }
});


    tinymce.init({
        selector: 'textarea#content',
        plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
    ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
});
</script>
