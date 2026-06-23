<li class="list-group-item border-0 ps-2 py-2">
    <div class="d-flex align-items-center gap-2 border rounded-3 p-3 bg-light bg-opacity-50 shadow-xs">
        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; flex-shrink: 0;">
            {{ substr($node->name, 0, 1) }}
        </div>
        <div>
            <div class="fw-bold fs-7">{{ $node->name }}</div>
            <span class="badge bg-primary-subtle text-primary border-0 rounded px-2 py-0.5 fs-9">
                {{ $node->roles->first()?->name ?? 'Staff' }}
            </span>
            <small class="text-muted d-block fs-8">{{ $node->department?->name }}</small>
        </div>
    </div>
    @if($node->subordinates->isNotEmpty())
        <ul class="list-group list-group-flush border-start border-primary border-opacity-10 ms-4 ps-2 mt-2">
            @foreach($node->subordinates as $sub)
                @include('modules.hierarchy.tree_node', ['node' => $sub])
            @endforeach
        </ul>
    @endif
</li>
