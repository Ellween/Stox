@extends('main')


@section('main-admin')

        {{-- {{ dd(strpos(Route::currentRouteName(), 'admin_yle') == 0)}}  --}}

    <div class ='p-3'>
        <div class="body-header">
            Create New Page
        </div>
            <hr style ='margin-bottom: 0;'>
            <div class ='user-search'>
                <div class ='d-flex align-items-center'>
                </div>
            </div>
            <div class="user-tables">
                <div class="form-table">
                    <form action="{{ route('edit_page',['id' => $single_page->id ]) }}" method="POST">
                      @csrf
                        <div class="page_title">
                            <label for="">Page Title</label>
                            <input type="text" name='title' class='form-control' placeholder="Page Title" value="{{ $single_page->title }}">
                        </div>
                        <div class="page_slug">
                            <label for="">Page Slug</label>
                            <input type="text" name='slug' class='form-control' placeholder="Page Slug" value="{{ $single_page->slug }}">
                        </div>
                        <div class="page_url">
                            <label for="">Page Url</label>
                            <input type="text" name='url' class='form-control' placeholder="Page Url" value="{{ $single_page->url }}">
                        </div>
                        <div class="page_content">
                            <label for="">Page Content</label>
                            <textarea name="content"  class='my-editor' id="content" cols="30" rows="10" class='form-control'>{{ $single_page->content }}</textarea>
                        </div>

                        <button class='btn btn-primary'>Submit</button>
                    </form>
                </div>
            </div>
    </div>

    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>


    <script>
            var editor_config = {
              path_absolute : "/",
              selector: "textarea.my-editor",
              plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
              relative_urls: false,
              file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
          
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
             
                if (type == 'image') {
                  cmsURL = cmsURL + "&type=Images";
                } else {
                  cmsURL = cmsURL + "&type=Files";
                }
          
                tinyMCE.activeEditor.windowManager.open({
                  file : cmsURL,
                  title : 'Filemanager',
                  width : x * 0.8,
                  height : y * 0.8,
                  resizable : "yes",
                  close_previous : "no"
                });
              }
            };
          
            tinymce.init(editor_config);
          </script>
@endsection
