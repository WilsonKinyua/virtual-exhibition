  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create a Chat Room</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{ route('admin.chat-rooms.store') }}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="exhibitor_id" value="{{ $exhibitor->id }}">
                      <div class="form-group">
                          <label class="required" for="name">{{ trans('cruds.chatRoom.fields.name') }}</label>
                          <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                              name="name" id="name" value="{{ old('name', '') }}" required>
                          @if ($errors->has('name'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('name') }}
                              </div>
                          @endif
                          <span class="help-block">{{ trans('cruds.chatRoom.fields.name_helper') }}</span>
                      </div>
                      <div class="form-group">
                          <button class="btn btn-warning" type="submit">
                              {{ trans('global.save') }}
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
