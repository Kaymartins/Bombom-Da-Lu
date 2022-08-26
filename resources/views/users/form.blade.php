<div class="mb-3">
    <label for="name" class="form-label">Nome:</label>
    <input type="text"
           id="name"
           name="name"
           class="form-control mb-2"
           value="{{ old('name',$user->name)}}">

    <label for="email" class="form-label">E-mail:</label>
    <input type="email"
           id="email"
           name="email"
           class="form-control mb-2"
           value="{{ old('email',$user->email)}}">

    <label for="registration" class="form-label">Matrícula:</label>
    <input type="text"
           id="registration"
           name="registration"
           class="form-control mb-2"
           value="{{ old('registration',$user->registration)}}">

    <label for="fidelity" class="form-label">Fidelidade:</label>
    <input
        type="text"
        id="fidelity"
        name="fidelity"
        class="form-control mb-2"
        value="{{ old('fidelity',$user->fidelity)}}">

    <div class="dropdown">
        <label for="permission" class="form-label">Permissão:</label><br>
        <select name="permission" id="permission" class="btn-lg dropdown-toggle border" aria-haspopup="true"
                aria-expanded="false">
            Permissão

            <ul class="dropdown-menu dropdown-menu-end">
                @if($user->permission == "Cliente")
                    <option value="Cliente" selected>Cliente</option>
                    <option value="Administrador">Admin</option>
                @else
                    <option value="Cliente">Cliente</option>
                    <option value="Administrador" selected>Administrador </option>
                @endif
            </ul>
        </select>
    </div>

    <label for="password" class="form-label mt-2">Senha:</label>
    <input type="password"
           id="password"
           name="password"
           class="form-control mb-2">

    @isset($user->id)
        <p>A senha continuará a mesma caso vazio</p>
    @endisset
</div>
