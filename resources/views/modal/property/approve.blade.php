<div class="modal fade" id="approveProperty" tabindex="-1" role="dialog" aria-labelledby="approvePropertyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>APPROVE PROPERTY</strong></p>
            <hr>
            <p class="card-text">Do your want to approve <span class="approve-name text-primary"></span> ? Just click the Approve button to continue the process.</p>
            <form method="POST" action="{{ URL::to('postApprove') }}">
               @csrf
               <input type="hidden" class="app-property-id" name="property_id">
               <input type="hidden" class="app-property-name" name="property_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Approve</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


