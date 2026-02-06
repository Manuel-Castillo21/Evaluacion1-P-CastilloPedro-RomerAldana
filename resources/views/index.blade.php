<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #000000b8;
            --secondary-color: #005eb5;
            --success-color: #000000;
            --light-bg: #f8f9fa;
            --border-radius: 10px;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .header-container {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .header-container h1 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .subtitle {
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .table-container {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-2px);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid #eee;
        }
        
        .badge-promedio {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .badge-excelente {
            background-color: rgba(76, 201, 240, 0.2);
            color: #0a58ca;
        }
        
        .badge-bueno {
            background-color: rgba(40, 167, 69, 0.2);
            color: #198754;
        }
        
        .badge-regular {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .badge-bajo {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 1rem;
        }
        
        .student-id {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .student-name {
            font-weight: 500;
        }
        
        .footer-info {
            text-align: center;
            padding: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .age-badge {
            display: inline-block;
            width: 32px;
            height: 32px;
            line-height: 32px;
            text-align: center;
            border-radius: 50%;
            background-color: #e9ecef;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                border-radius: 8px;
            }
            
            .table tbody td {
                display: block;
                text-align: right;
                border-top: none;
                border-bottom: 1px solid #dee2e6;
            }
            
            .table tbody td:last-child {
                border-bottom: none;
            }
            
            .table tbody td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                color: var(--primary-color);
            }
            
            .table td[data-label]:before {
                content: attr(data-label);
            }
        }
    </style>
</head>
<body class="container mt-4 mb-5">
    <!-- Encabezado -->
    <div class="header-container">
        <h1><i class="bi bi-people-fill me-2"></i>Estudiantes Registrados</h1>
        <div class="subtitle">
            <i class="bi bi-info-circle me-1"></i>Lista completa de estudiantes con sus datos académicos y personales
        </div>
    </div>
    
    <!-- Contenido principal -->
    @forelse($estudiantes as $estudiante)
        @if ($loop->first)
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Promedio</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
        @endif
                            <tr>
                                <td class="student-id" data-label="ID">{{ $estudiante->id }}</td>
                                <td class="student-name" data-label="Nombre Completo">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>{{ $estudiante->nombrecompleto }}
                                </td>
                                <td data-label="Promedio">
                                    @php
                                        $promedio = $estudiante->promedio;
                                        if($promedio >= 90) {
                                            $clase = "badge-excelente";
                                        } elseif($promedio >= 80) {
                                            $clase = "badge-bueno";
                                        } elseif($promedio >= 70) {
                                            $clase = "badge-regular";
                                        } else {
                                            $clase = "badge-bajo";
                                        }
                                    @endphp
                                    <span class="badge-promedio {{ $clase }}">
                                        {{ $promedio }}
                                    </span>
                                </td>
                                <td data-label="Edad">
                                    <span class="age-badge">{{ $estudiante->edad }}</span> años
                                </td>
                                <td data-label="Fecha de Nacimiento">
                                    <i class="bi bi-calendar3 me-1 text-secondary"></i>
                                    {{ $estudiante->fechadenacimiento }}
                                </td>
                            </tr>
        @if ($loop->last)
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Resumen -->
            <div class="footer-info">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="bi bi-person-check me-1"></i> 
                        <strong>{{ count($estudiantes) }}</strong> estudiantes registrados
                    </div>
                    <div class="col-md-4 mb-2">
                        <i class="bi bi-graph-up me-1"></i> 
                        Promedio general: 
                        <strong>
                            @php
                                $total = 0;
                                foreach($estudiantes as $est) {
                                    $total += $est->promedio;
                                }
                                echo number_format($total / count($estudiantes), 1);
                            @endphp
                        </strong>
                    </div>
                    <div class="col-md-4 mb-2">
                        <i class="bi bi-calendar-range me-1"></i> 
                        Última actualización: {{ date('d/m/Y') }}
                    </div>
                </div>
            </div>
        @endif
    @empty
        <!-- Estado vacío -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-people"></i>
            </div>
            <h3 class="text-muted">No se encontraron registros en el sistema</h3>
            <p class="text-muted mb-4">Actualmente no hay estudiantes registrados en la base de datos.</p>
            <button class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Agregar Primer Estudiante
            </button>
        </div>
    @endforelse
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Añadir etiquetas para responsividad en móviles
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 768) {
                const headers = ['ID', 'Nombre Completo', 'Promedio', 'Edad', 'Fecha de Nacimiento'];
                const cells = document.querySelectorAll('tbody td');
                
                cells.forEach((cell, index) => {
                    const headerIndex = index % headers.length;
                    cell.setAttribute('data-label', headers[headerIndex]);
                });
            }
            
            // Efecto de hover mejorado para filas
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>