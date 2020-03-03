<div class="modal fade" id="statusProperty" tabindex="-1" role="dialog" aria-labelledby="statusPropertyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-7">
         <div class="modal-body">
            <p class="card-title text-center mb-0"><strong>CHANGE PROPERTY STATUS</strong></p>
            <hr>
            <p class="card-text">Are you sure you want to update the status of <strong class="js-statusprop"></strong>? Please select status below.</p>
            <form method="POST" action="{{ URL::to('postStatus') }}">
               @csrf
               <div class="form-group">
                  <input type="hidden" class="js-propertyid" name="property_id"/>
                  <input type="hidden" class="js-propname" name="propname"/>
               </div>
               <div class="form-group">
                  <select class="form-control form-control-sm js-statusid" name="status_id">
                     <option selected disabled>Select Status</option>
                     @foreach(App\Modules\Helpers::propertyStatus() as $status)
                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                     @endforeach
                  </select>
               </div>
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Change</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


