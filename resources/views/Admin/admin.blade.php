<!-- Admin Lama -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Partner - Admin Dashboard</title>
    <style>
        :root {
            --primary: #1e40af;
            --secondary: #1d4ed8;
            --success: #16a34a;
            --danger: #dc2626;
            --warning: #eab308;
            --light: #f1f5f9;
            --dark: #1e293b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8fafc;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background-color: var(--dark);
            color: white;
            padding: 20px 0;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid #334155;
        }
        
        .sidebar-header h2 {
            font-size: 1.5rem;
            color: white;
        }
        
        .sidebar-header p {
            color: #94a3b8;
            font-size: 0.85rem;
        }
        
        .menu {
            margin-top: 20px;
            list-style: none;
        }
        
        .menu-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .menu-item:hover {
            background-color: #334155;
        }
        
        .menu-item.active {
            background-color: var(--primary);
            border-left: 4px solid var(--warning);
        }
        
        .menu-item i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .header h1 {
            font-size: 1.8rem;
            color: var(--dark);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .card-title {
            font-size: 1.2rem;
            color: var(--dark);
            margin: 0;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f8fafc;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            font-weight: 600;
            color: #64748b;
        }
        
        tbody tr:hover {
            background-color: #f1f5f9;
        }
        
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
        }
        
        .btn-success {
            background-color: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #15803d;
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #b91c1c;
        }
        
        .btn-warning {
            background-color: var(--warning);
            color: white;
        }
        
        .btn-warning:hover {
            background-color: #ca8a04;
        }
        
        .btn-sm {
            padding: 4px 8px;
            font-size: 0.85rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }
        
        .tab.active {
            border-bottom: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 500px;
            max-width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .modal-close {
            font-size: 1.5rem;
            cursor: pointer;
            color: #64748b;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #475569;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        
        .badge-success {
            background-color: #dcfce7;
            color: var(--success);
        }
        
        .badge-warning {
            background-color: #fef9c3;
            color: #ca8a04;
        }
        
        .badge-danger {
            background-color: #fee2e2;
            color: var(--danger);
        }
        
        /* Dashboard Stats */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon.users {
            background-color: var(--primary);
        }
        
        .stat-icon.owners {
            background-color: var(--success);
        }
        
        .stat-icon.rentals {
            background-color: var(--warning);
        }
        
        .stat-icon.pending {
            background-color: var(--danger);
        }
        
        .stat-info h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .stat-info p {
            font-size: 0.85rem;
            color: #64748b;
        }
        
        .user-detail {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .user-detail-info {
            flex: 1;
        }
        
        .user-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .user-name {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .user-email {
            color: #64748b;
            margin-bottom: 15px;
        }
        
        .user-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .user-meta-item {
            margin-bottom: 5px;
        }
        
        .meta-label {
            font-weight: 600;
            display: block;
            color: #64748b;
            font-size: 0.85rem;
        }
        
        .meta-value {
            color: var(--dark);
        }
        
        .document-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .document-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }
        
        .document-thumbnail {
            height: 150px;
            background-color: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .document-thumbnail i {
            font-size: 3rem;
            color: #64748b;
        }
        
        .document-info {
            padding: 10px;
        }
        
        .document-title {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .document-meta {
            color: #64748b;
            font-size: 0.8rem;
        }
        
        .search-filter {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .search-box {
            flex: 1;
            position: relative;
        }
        
        .search-box input {
            padding-left: 35px;
        }
        
        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }
        
        .filter-container {
            display: flex;
            gap: 10px;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }
        
        .page-item {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .page-item:hover {
            background-color: #f1f5f9;
        }
        
        .page-item.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .user-detail {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .user-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Rental Partner</h2>
                <p>Admin Dashboard</p>
            </div>
            <ul class="menu">
                <li class="menu-item active" data-page="dashboard">
                    <i class="fas fa-chart-bar"></i>
                    <span>Dashboard</span>
                </li>
                <li class="menu-item" data-page="users">
                    <i class="fas fa-users"></i>
                    <span>Pengguna</span>
                </li>
                <li class="menu-item" data-page="owner-requests">
                    <i class="fas fa-user-check"></i>
                    <span>Permintaan Owner</span>
                </li>
                <li class="menu-item" data-page="posts">
                    <i class="fas fa-car"></i>
                    <span>Postingan Mobil</span>
                </li>
                <li class="menu-item" data-page="reports">
                    <i class="fas fa-flag"></i>
                    <span>Laporan</span>
                </li>
                <li class="menu-item" data-page="settings">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </li>
                <li class="menu-item" id="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <span>Admin</span>
                    <img src="https://cdn-icons-png.flaticon.com/256/6522/6522516.png" alt="Admin Profile">
                </div>
            </div>
            
            <!-- Dashboard Page -->
            <div class="page" id="dashboard-page">
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>2,456</h3>
                            <p>Total Pengguna</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon owners">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="stat-info">
                            <h3>358</h3>
                            <p>Total Owner</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon rentals">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-info">
                            <h3>1,245</h3>
                            <p>Postingan Aktif</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon pending">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>28</h3>
                            <p>Permintaan Pending</p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Permintaan Owner Terbaru</h2>
                        <button class="btn btn-primary btn-sm" onclick="changePage('owner-requests')">Lihat Semua</button>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Budi Santoso</td>
                                    <td>budi.santoso@email.com</td>
                                    <td>15 Mei 2025</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(1)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Siti Nurhayati</td>
                                    <td>siti.nurhayati@email.com</td>
                                    <td>14 Mei 2025</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(2)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agus Wijaya</td>
                                    <td>agus.wijaya@email.com</td>
                                    <td>13 Mei 2025</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(3)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Postingan Terbaru</h2>
                        <button class="btn btn-primary btn-sm" onclick="changePage('posts')">Lihat Semua</button>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mobil</th>
                                    <th>Owner</th>
                                    <th>Harga/Hari</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Toyota Avanza 2023</td>
                                    <td>Budi Santoso</td>
                                    <td>Rp 350.000</td>
                                    <td>17 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(1)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Honda Brio 2022</td>
                                    <td>Siti Nurhayati</td>
                                    <td>Rp 300.000</td>
                                    <td>16 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(2)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mitsubishi Xpander 2023</td>
                                    <td>Agus Wijaya</td>
                                    <td>Rp 450.000</td>
                                    <td>15 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(3)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Users Page -->
            <div class="page" id="users-page" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Daftar Pengguna</h2>
                        <div>
                            <button class="btn btn-primary btn-sm" id="add-user-btn">
                                <i class="fas fa-plus"></i> Tambah Pengguna
                            </button>
                        </div>
                    </div>
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Cari pengguna...">
                        </div>
                        <div class="filter-container">
                            <select>
                                <option value="all">Semua Tipe</option>
                                <option value="user">Pengguna Biasa</option>
                                <option value="owner">Owner</option>
                                <option value="admin">Admin</option>
                            </select>
                            <select>
                                <option value="all">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="suspended">Ditangguhkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tipe Akun</th>
                                    <th>Status</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="users-table">
                                <tr>
                                    <td>1001</td>
                                    <td>Budi Santoso</td>
                                    <td>budi.santoso@email.com</td>
                                    <td>Owner</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>10 Jan 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewUser(1001)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editUser(1001)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser(1001)">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1002</td>
                                    <td>Siti Nurhayati</td>
                                    <td>siti.nurhayati@email.com</td>
                                    <td>Pengguna</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>15 Feb 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewUser(1002)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editUser(1002)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser(1002)">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1003</td>
                                    <td>Agus Wijaya</td>
                                    <td>agus.wijaya@email.com</td>
                                    <td>Owner</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>5 Mar 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewUser(1003)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editUser(1003)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser(1003)">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1004</td>
                                    <td>Dewi Lestari</td>
                                    <td>dewi.lestari@email.com</td>
                                    <td>Pengguna</td>
                                    <td><span class="badge badge-danger">Ditangguhkan</span></td>
                                    <td>20 Apr 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewUser(1004)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editUser(1004)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser(1004)">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1005</td>
                                    <td>Rudi Hartono</td>
                                    <td>rudi.hartono@email.com</td>
                                    <td>Pengguna</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>12 May 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewUser(1005)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editUser(1005)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser(1005)">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item">3</div>
                        <div class="page-item">4</div>
                        <div class="page-item">5</div>
                        <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Owner Requests Page -->
            <div class="page" id="owner-requests-page" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Permintaan Owner</h2>
                    </div>
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Cari permintaan...">
                        </div>
                        <div class="filter-container">
                            <select>
                                <option value="all">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Disetujui</option>
                                <option value="rejected">Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2001</td>
                                    <td>Budi Santoso</td>
                                    <td>budi.santoso@email.com</td>
                                    <td>15 Mei 2025</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(2001)">Lihat</button>
                                            <button class="btn btn-success btn-sm" onclick="approveOwnerRequest(2001)">Setujui</button>
                                            <button class="btn btn-danger btn-sm" onclick="rejectOwnerRequest(2001)">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2002</td>
                                    <td>Siti Nurhayati</td>
                                    <td>siti.nurhayati@email.com</td>
                                    <td>14 Mei 2025</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(2002)">Lihat</button>
                                            <button class="btn btn-success btn-sm" onclick="approveOwnerRequest(2002)">Setujui</button>
                                            <button class="btn btn-danger btn-sm" onclick="rejectOwnerRequest(2002)">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2003</td>
                                    <td>Agus Wijaya</td>
                                    <td>agus.wijaya@email.com</td>
                                    <td>13 Mei 2025</td>
                                    <td><span class="badge badge-success">Disetujui</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(2003)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2004</td>
                                    <td>Dewi Lestari</td>
                                    <td>dewi.lestari@email.com</td>
                                    <td>12 Mei 2025</td>
                                    <td><span class="badge badge-danger">Ditolak</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewOwnerRequest(2004)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item">3</div>
                        <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Posts Page -->
            <div class="page" id="posts-page" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Postingan Mobil</h2>
                    </div>
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Cari postingan...">
                        </div>
                        <div class="filter-container">
                            <select>
                                <option value="all">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="suspended">Ditangguhkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mobil</th>
                                    <th>Owner</th>
                                    <th>Harga/Hari</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3001</td>
                                    <td>Toyota Avanza 2023</td>
                                    <td>Budi Santoso</td>
                                    <td>Rp 350.000</td>
                                    <td>17 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(3001)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editPost(3001)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="suspendPost(3001)">Tangguhkan</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3002</td>
                                    <td>Honda Brio 2022</td>
                                    <td>Siti Nurhayati</td>
                                    <td>Rp 300.000</td>
                                    <td>16 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(3002)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editPost(3002)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="suspendPost(3002)">Tangguhkan</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3003</td>
                                    <td>Mitsubishi Xpander 2023</td>
                                    <td>Agus Wijaya</td>
                                    <td>Rp 450.000</td>
                                    <td>15 Mei 2025</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(3003)">Lihat</button>
                                            <button class="btn btn-warning btn-sm" onclick="editPost(3003)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="suspendPost(3003)">Tangguhkan</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3004</td>
                                    <td>Daihatsu Xenia 2021</td>
                                    <td>Dewi Lestari</td>
                                    <td>Rp 320.000</td>
                                    <td>14 Mei 2025</td>
                                    <td><span class="badge badge-danger">Ditangguhkan</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewPost(3004)">Lihat</button>
                                            <button class="btn btn-success btn-sm" onclick="activatePost(3004)">Aktifkan</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item">3</div>
                        <div class="page-item">4</div>
                        <div class="page-item">5</div>
                        <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Reports Page -->
            <div class="page" id="reports-page" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Laporan</h2>
                    </div>
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Cari laporan...">
                        </div>
                        <div class="filter-container">
                            <select>
                                <option value="all">Semua Tipe</option>
                                <option value="user">Pengguna</option>
                                <option value="car">Mobil</option>
                                <option value="transaction">Transaksi</option>
                            </select>
                            <select>
                                <option value="all">Semua Status</option>
                                <option value="open">Terbuka</option>
                                <option value="processing">Diproses</option>
                                <option value="closed">Ditutup</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Tipe</th>
                                    <th>Dilaporkan Oleh</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4001</td>
                                    <td>Mobil tidak sesuai deskripsi</td>
                                    <td>Mobil</td>
                                    <td>Siti Nurhayati</td>
                                    <td>16 Mei 2025</td>
                                    <td><span class="badge badge-warning">Terbuka</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewReport(4001)">Lihat</button>
                                            <button class="btn btn-success btn-sm" onclick="processReport(4001)">Proses</button>
                                            <button class="btn btn-danger btn-sm" onclick="closeReport(4001)">Tutup</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4002</td>
                                    <td>Owner tidak responsif</td>
                                    <td>Pengguna</td>
                                    <td>Dewi Lestari</td>
                                    <td>15 Mei 2025</td>
                                    <td><span class="badge badge-success">Diproses</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewReport(4002)">Lihat</button>
                                            <button class="btn btn-danger btn-sm" onclick="closeReport(4002)">Tutup</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4003</td>
                                    <td>Pembayaran tidak kembali</td>
                                    <td>Transaksi</td>
                                    <td>Rudi Hartono</td>
                                    <td>14 Mei 2025</td>
                                    <td><span class="badge badge-danger">Ditutup</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm" onclick="viewReport(4003)">Lihat</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Settings Page -->
            <div class="page" id="settings-page" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Pengaturan Sistem</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Aplikasi</label>
                            <input type="text" value="Rental Partner">
                        </div>
                        <div class="form-group">
                            <label>Email Admin</label>
                            <input type="email" value="admin@rentalpartner.id">
                        </div>
                        <div class="form-group">
                            <label>Notifikasi Email</label>
                            <select>
                                <option value="enabled">Aktif</option>
                                <option value="disabled">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Persentase Komisi</label>
                            <input type="number" value="5">
                        </div>
                        <div class="form-group">
                            <label>Maksimum Gambar per Postingan</label>
                            <input type="number" value="10">
                        </div>
                        <div class="form-group">
                            <label>Verifikasi Pengguna Baru</label>
                            <select>
                                <option value="auto">Otomatis</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Simpan Pengaturan</button>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Maintenance Mode</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Status Maintenance</label>
                            <select>
                                <option value="disabled">Tidak Aktif</option>
                                <option value="enabled">Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pesan Maintenance</label>
                            <textarea rows="3">Sistem sedang dalam pemeliharaan. Silakan coba beberapa saat lagi.</textarea>
                        </div>
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="datetime-local">
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="datetime-local">
                        </div>
                        <button class="btn btn-warning">Aktifkan Maintenance Mode</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal untuk Melihat Detail Pengguna -->
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
    
    <!-- Modal untuk Edit Pengguna -->
    <div class="modal" id="edit-user-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Pengguna</h3>
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
    
    <script>
        // Function to change pages
        function changePage(page) {
            // Hide all pages
            document.querySelectorAll('.page').forEach(p => p.style.display = 'none');
            
            // Show the selected page
            document.getElementById(page + '-page').style.display = 'block';
            
            // Update header title
            document.querySelector('.header h1').textContent = page.charAt(0).toUpperCase() + page.slice(1).replace('-', ' ');
            
            // Update active menu item
            document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
            document.querySelector(`.menu-item[data-page="${page}"]`).classList.add('active');
        }
        
        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // User functions
        function viewUser(userId) {
            openModal('view-user-modal');
        }
        
        function editUser(userId) {
            closeModal('view-user-modal');
            openModal('edit-user-modal');
        }
        
        function deleteUser(userId) {
            if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                alert('Pengguna berhasil dihapus');
            }
        }
        
        // Owner request functions
        function viewOwnerRequest(requestId) {
            alert('Melihat detail permintaan owner ' + requestId);
        }
        
        function approveOwnerRequest(requestId) {
            if (confirm('Setujui permintaan owner ini?')) {
                alert('Permintaan owner berhasil disetujui');
            }
        }
        
        function rejectOwnerRequest(requestId) {
            if (confirm('Tolak permintaan owner ini?')) {
                alert('Permintaan owner berhasil ditolak');
            }
        }
        
        // Post functions
        function viewPost(postId) {
            alert('Melihat detail postingan ' + postId);
        }
        
        function editPost(postId) {
            alert('Edit postingan ' + postId);
        }
        
        function suspendPost(postId) {
            if (confirm('Tangguhkan postingan ini?')) {
                alert('Postingan berhasil ditangguhkan');
            }
        }
        
        function activatePost(postId) {
            if (confirm('Aktifkan postingan ini?')) {
                alert('Postingan berhasil diaktifkan');
            }
        }
        
        // Report functions
        function viewReport(reportId) {
            alert('Melihat detail laporan ' + reportId);
        }
        
        function processReport(reportId) {
            alert('Memproses laporan ' + reportId);
        }
        
        function closeReport(reportId) {
            if (confirm('Tutup laporan ini?')) {
                alert('Laporan berhasil ditutup');
            }
        }
        
        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Menu item clicks
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (this.id !== 'logout-btn') {
                        changePage(this.dataset.page);
                    }
                });
            });
            
            // Logout button
            document.getElementById('logout-btn').addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin keluar?')) {
                    alert('Anda telah keluar dari sistem');
                    // In a real app, this would redirect to login page
                }
            });
            
            // Add user button
            document.getElementById('add-user-btn').addEventListener('click', function() {
                alert('Form untuk menambah pengguna baru akan ditampilkan di sini');
            });
        });
    </script>
</body>
</html>