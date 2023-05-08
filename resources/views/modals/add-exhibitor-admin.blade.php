  <!-- Modal -->
  <div class="modal fade" id="addUserAdminModal" tabindex="-1" aria-labelledby="addUserAdminModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addUserAdminModalLabel">Add User as admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p class="text-danger">
                      Ensure that the user is already registered in the system. If not, please request the user to
                      register first.
                  </p>
                  <form method="POST" action="{{ route('admin-add', $exhibitor->slug) }}"
                      enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label class="required" for="name">Email</label>
                          <input class="form-control" type="email" name="email" id="email"
                              value="{{ old('email', '') }}" required>
                      </div>
                      <div class="form-group">
                          <button class="btn btn-warning text-white" type="submit">
                              Add User as Admin
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
