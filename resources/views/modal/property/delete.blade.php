<div class="modal fade" id="removedProperty" tabindex="-1" role="dialog" aria-labelledby="removedPropertyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>REMOVED PROPERTY</strong></p>
            <hr>
            <p class="card-text">Do you want to removed <span class="removed-name text-primary"></span> ? Just click Remove button to continue the process.</p>
            <form method="POST" action="{{ URL::to('postRemove') }}">
               @csrf
               <input type="hidden" class="rem-property-id" name="property_id">
               <input type="hidden" class="rem-property-name" name="property_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Remove</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


