<div class="col-lg-12">
    <div class="group-avatar">
        <img src="{{ asset('storage/'.$group->group_cover_image) }}" alt="">
        @if ($isOwner)
            <a href="#" title="" class="add-member"><i class="icofont-check-circled"></i>Add Member</a>
        @endif

    </div>
    <div class="grp-info about">
        <h4>{{$group->group_name}}</h4>

        <ul class="joined-info">
            <li><span>private group</span><i class="icofont-lock ml-2"></i></li>
            <!-- <li><span>public group</span><i class="icofont-globe ml-2"></i></li> -->
            <li><span>Members:</span> {{$members->count()}}</li>
            <li></li>
        </ul>
        <ul class="nav nav-tabs about-btn mt-3">
            <li class="nav-item"><a class="active" href="#posts" data-toggle="tab" wire:ignore>Posts</a></li>
            <li class="nav-item"><a class="" href="#members-{{Modules\GroupModule\Enum\GroupStateEnum::APPROVED}}" data-toggle="tab" wire:ignore >Members</a></li>
            <li class="nav-item"><a class="" href="#members-{{Modules\GroupModule\Enum\GroupStateEnum::PENDING}}" data-toggle="tab" wire:ignore >Group Join</a></li>
        </ul>
        <ul class="more-grp-info mt-3">
            <li>
                <form class="c-form" method="post">
                    <input type="text" placeholder="Search...">
                    <i class="icofont-search-1"></i>
                </form>
            </li>
        </ul>
    </div>
    @include('groupmodule::website.modals.add_member_model')
</div>