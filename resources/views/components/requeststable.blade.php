@props(['roleRequests', 'role'])

<div class="table-responsive mb-4">
    <h5 class="fw-bold text-brand mb-3">
        @if($role === 'admin') Richieste Amministratore
        @elseif($role === 'revisor') Richieste Revisore
        @else Richieste Redattore
        @endif
    </h5>

    @if($roleRequests->isEmpty())
        <p class="text-muted small">Nessuna richiesta in attesa.</p>
    @else
        {{-- Mobile: cards --}}
        <div class="d-md-none">
            @foreach($roleRequests as $request)
            <div class="card mb-3 bg-body-secondary shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">{{ $request->getFullName() }}</h6>
                    <p class="text-muted small mb-2">{{ $request->email }}</p>
                    <form action="
                        @if($role === 'admin') {{ route('admin.approveAdmin', $request) }}
                        @elseif($role === 'revisor') {{ route('admin.approveRevisor', $request) }}
                        @else {{ route('admin.approveWriter', $request) }}
                        @endif
                    " method="POST">
                        @csrf
                        <button type="submit" class="btn btn-brand btn-sm">Approva</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{-- Desktop: tabella --}}
        <div class="d-none d-md-block table-responsive">
            <table class="table table-bordered table-hover align-middle bg-body-secondary shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Azione</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roleRequests as $request)
                        <tr>
                            <td>{{ $request->getFullName() }}</td>
                            <td>{{ $request->email }}</td>
                            <td>
                                <form action="
                                    @if($role === 'admin') {{ route('admin.approveAdmin', $request) }}
                                    @elseif($role === 'revisor') {{ route('admin.approveRevisor', $request) }}
                                    @else {{ route('admin.approveWriter', $request) }}
                                    @endif
                                " method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-brand btn-sm">Approva</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
