@extends('owner.layout')

@section('title', 'Edit Postingan')

@section('content')

<div class="modal" id="edit-user-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Postingan</h3>
                <span class="modal-close" onclick="closeModal('edit-user-modal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="Budi Santoso">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="budi.santoso@email.com">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="tel" value="+62812-3456-7890">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea>Jl. Pahlawan No. 123, Jakarta</textarea>
                </div>
                <div class="form-group">
                    <label>Tipe Akun</label>
                    <select>
                        <option value="user">Pengguna</option>
                        <option value="owner" selected>Owner</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select>
                        <option value="active" selected>Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                        <option value="suspended">Ditangguhkan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan Perubahan</button>
                <button class="btn btn-danger" onclick="closeModal('edit-user-modal')">Batal</button>
            </div>
        </div>
    </div>
@endsection