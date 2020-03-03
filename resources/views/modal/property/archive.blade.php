<div class="modal fade" id="archiveProperty" tabindex="-1" role="dialog" aria-labelledby="archivePropertyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>ARCHIVE PROPERTY</strong></p>
            <hr>
            <p class="card-text">Do you want to archive <span class="archive-name text-primary"></span> ? Just click Archive button to continue the process.</p>
            <form method="POST" action="{{ URL::to('postArchive') }}">
               @csrf
               <input type="hidden" class="arc-property-id" name="property_id">
               <input type="hidden" class="arc-property-name" name="property_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Archive</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>