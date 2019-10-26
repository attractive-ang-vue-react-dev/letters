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

    @if(count($contacts) > 0)
      <form action="/letter/send" method="POST">
        @csrf

        @if(isset($letter_id))
          <input type="hidden" name="letter_id" value="{{ $letter_id }}">
        @endif

        <input type="hidden" name="is_draft" id="is-draft" value="no">

        <select class="custom-select" name="contact_id">
          <option selected>Select a Contact</option>

          @foreach($contacts as $c)
            <option @if(isset($contact_id)) @if ($c->id == $contact_id) selected @endif @endif value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }} - {{ $c->facility_name }}</option>
          @endforeach
        </select>


        <textarea class="form-control" name="content" placeholder="Your letter goes here." rows="10">@if(isset($content)){{ $content }} @endif</textarea>

        <button class="btn btn-sm btn-primary" type="submit">Send Letter</button>
        <button class="btn btn-sm btn-secondary" id="save-draft">Save Draft</button>
      </form>
    @else
      <p>You don't have any Contacts. You should first add one.</p>

      <p><a href="/contacts" class="btn btn-sm btn-primary">Add a Contact</a></p>
    @endif

    <script>
      $(document).ready(function() {
        $("#save-draft").click(function(e) {
          $("#is-draft").val('yes');
          return true;
        });
      });
    </script>
  </main>
@endsection
