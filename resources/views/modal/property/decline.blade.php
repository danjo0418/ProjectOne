<div class="modal fade" id="declineProperty" tabindex="-1" role="dialog" aria-labelledby="declinePropertyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>DECLINE PROPERTY</strong></p>
            <hr>
            <p class="card-text">Do you want to decline <span class="decline-name text-primary"></span> ? Just click Decline button to continue the process.</p>
            <form method="POST" action="{{ URL::to('postDecline') }}">
               @csrf
               <input type="hidden" class="dec-property-id" name="property_id">
               <input type="hidden" class="dec-property-name" name="property_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Decline</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


