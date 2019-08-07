@extends('main')


@section('main-admin')

    {{-- Glossary Add Popup --}}

    <div class="add_glossary_popup">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Glossary Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <input type="text"  placeholder="Enter title" name='title' id='glossary_title' class='form-control'>
                    <textarea name="body" cols="30" rows="5"  id='glossary_text' placeholder="Enter Text" class='form-control mt-2'></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger submit-glossary" data-dismiss="modal" aria-label="Close">Save changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    {{--  View Modal  --}}

    <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Glossary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <h5 class='glossary_header'></h5>
                        </div>
                        <div class="card-body">
                            <p class='glossary_body' ></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>


     {{--  Edit Modal  --}}

     <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Glossary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <input type="text" placeholder="Enter title" name='title' id='edit_glossary_title' class='form-control'>
                    <textarea name="body" cols="30" rows="5"  id='edit_glossary_text' placeholder="Enter Text" class='form-control mt-2'></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"  class="btn btn-danger edit_submit-glossary" data-dismiss="modal" aria-label="Close">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    <div class ='p-3'>
        <div class="body-header">
        <button data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus" style ='padding-right: 10px;'></i>Add New Item</button>
        </div>
            <div class ='user-search'>
                <div class ='d-flex align-items-center'>
                </div>
            </div>
            <div class="user-tables">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Text</th>
                        <th scope="col" class='text-center'>Actions</th>
                        </tr>
                    </thead>
                    <tbody class='amas' data-id="">
                        @foreach ($glossary as $glossary)
                            @include('admin.glossary.glossary_items')
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection
