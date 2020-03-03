<div class="modal fade" id="approveAgent" tabindex="-1" role="dialog" aria-labelledby="approveAgentLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>APPROVE AGENT</strong></p>
            <hr>
            <p class="card-text">All information of <span class="text-primary app-name"></span> are reliable. If you want to approve his/her application. Please notify to this email <span class="text-primary app-email"></span>.</p>
            <form method="POST" action="{{ URL::to('approved-agent') }}">
               @csrf
               <input type="hidden" class="approve-id" name="agent_id">
               <input type="hidden" class="approve-name" name="agent_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Approve</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


