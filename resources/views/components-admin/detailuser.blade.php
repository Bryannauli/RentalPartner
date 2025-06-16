    <div class="modal" id="view-user-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Pengguna</h3>
                <span class="modal-close" onclick="closeModal('view-user-modal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail">
                    <img src="/api/placeholder/120/120" alt="User Avatar" class="user-avatar">
                    <div class="user-detail-info">
                        <h2 class="user-name">Budi Santoso</h2>
                        <p class="user-email">budi.santoso@email.com</p>
                        <div class="user-meta">
                            <div class="user-meta-item">
                                <span class="meta-label">ID Pengguna</span>
                                <span class="meta-value">1001</span>
                            </div>
                            <div class="user-meta-item">
                                <span class="meta-label">Tipe Akun</span>
                                <span class="meta-value">Owner</span>
                            </div>
                            <div class="user-meta-item">
                                <span class="meta-label">Status</span>
                                <span class="meta-value">Aktif</span>
                            </div>
                            <div class="user-meta-item">
                                <span class="meta-label">Terdaftar</span>
                                <span class="meta-value">10 Jan 2025</span>
                            </div>
                            <div class="user-meta-item">
                                <span class="meta-label">No. Telepon</span>
                                <span class="meta-value">+62812-3456-7890</span>
                            </div>
                            <div class="user-meta-item">
                                <span class="meta-label">Alamat</span>
                                <span class="meta-value">Jl. Pahlawan No. 123, Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tabs">
                    <div class="tab active" data-tab="user-cars">Mobil</div>
                    <div class="tab" data-tab="user-transactions">Transaksi</div>
                    <div class="tab" data-tab="user-documents">Dokumen</div>
                </div>
                
                <div class="tab-content" id="user-cars">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mobil</th>
                                    <th>Harga/Hari</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3001</td>
                                    <td>Toyota Avanza 2023</td>
                                    <td>Rp 350.000</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3005</td>
                                    <td>Toyota Innova 2022</td>
                                    <td>Rp 450.000</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Lihat</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" onclick="editUser(1001)">Edit Pengguna</button>
                <button class="btn btn-danger" onclick="closeModal('view-user-modal')">Tutup</button>
            </div>
        </div>
    </div>