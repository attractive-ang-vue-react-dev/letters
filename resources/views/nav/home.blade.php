@extends('layouts.letters')

@section('content')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Compose a new letter</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          {{-- <button class="btn btn-sm btn-outline-secondary">Share</button> --}}
          {{-- <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
        </div>
        {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button> --}}
      </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(count($contacts) > 0)
      <form action="/letter/send" method="POST" id="send-letter-form" enctype="multipart/form-data">
        @csrf

        @if(isset($letter_id))
          <input type="hidden" name="letter_id" value="{{ $letter_id }}">
        @endif

        <input type="hidden" name="is_draft" id="is-draft" value="no">

        <select class="custom-select form-control" name="contact_id">
          <option selected>Select a Contact</option>

          @foreach($contacts as $c)
            <option @if(isset($contact_id)) @if ($c->id == $contact_id) selected @endif @endif value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }} - {{ $c->facility_name }}</option>
          @endforeach
        </select>


        <textarea class="form-control" id="content" name="content" placeholder="Your letter goes here." rows="10">@if(isset($content)){{ $content }} @endif</textarea>

        <div class="custom-file" style="margin-top: 20px;">
          <input type="file" class="custom-file-input" name="attached_image" id="customFile" onChange='update_preview(this);'>
          <label class="custom-file-label" for="customFile">Choose an image (PNG or JPG; No larger than 5MB)</label>
        </div>

        <button class="btn btn-sm btn-primary" id="send-letter" type="submit">Continue</button>
        <button class="btn btn-sm btn-secondary" id="save-draft">Save Draft</button>
      </form>
    @else
      <p>You don't have any Contacts. You should first add one.</p>

      <p><a href="/contacts" class="btn btn-sm btn-primary">Add a Contact</a></p>
    @endif

    <div class="modal" tabindex="-1" role="dialog" id="modal-review">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Review your letter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="modal-letter-content"></p>
            <img id="previewImg" style="max-width: 300px;">
          </div>
          <div class="modal-footer">
            <button type="button" id="send-letter-final" class="btn btn-primary">Send</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      function update_preview(input){
         $('#previewImg')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
      }
      $(document).ready(function() {
        $("#save-draft").click(function(e) {
          $("#is-draft").val('yes');
          return true;
        });

        $("#send-letter").click(function(e) {
          e.preventDefault();
          var modal = $("#modal-review");
          var content = $("#content").val().replace(/\n/g, "<br>");
          $("#modal-letter-content").html(content);
          modal.modal('show');
          return false;
        });

        $("#send-letter-final").click(function(e) {
          $("#send-letter-form").submit();
        });
      });
    </script>
  </main>
@endsection
