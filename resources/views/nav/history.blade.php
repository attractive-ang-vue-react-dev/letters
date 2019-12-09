@extends('layouts.letters')

@section('content')
  <main role="main" class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Letter History</h1>
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

    @if(count($letters) > 0)
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Created</th>
              <th scope="col">To</th>
              <th scope="col">Facility</th>
              <th scope="col">Content</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($letters as $l)
              <?php
                if ($l->sent == false) {
                  $is_draft = true;
                } else {
                  $is_draft = false;
                }

                $contact = \App\Contact::find($l->contact_id);
                $contact_name = $contact->first_name . " " . $contact->last_name . ", " . $contact->inmate_number;

                $content = substr($l->content, 0, 100) . "...";
              ?>
              <tr>
                <td>{{ \Carbon\Carbon::parse($l->created_at)->toDayDateTimeString() }}</td>
                <td>{{ $contact_name }}</td>
                <td>{{ $contact->facility_name }}</td>
                <td>{{ $content }}</td>
                <td>
                  @if($l->sent)
                    @if($l->delivered)
                      <span class="badge badge-success">Delivered</span>
                    @else
                      <span class="badge badge-warning">In Route</span>
                    @endif
                  @else
                    <span class="badge badge-secondary">Draft</span>
                  @endif
                </td>
                <td>
                  @if($is_draft)
                    <a class="btn btn-sm btn-primary" href="/compose/continue/{{ $l->id }}">Continue Letter</a>
                  @endif
                  <a class="btn btn-sm btn-danger" href="/letter/delete/{{ $l->id }}" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p>You haven't sent any letters yet.</p>
    @endif
  </main>
@endsection
