-- =========================
-- INSERTS: rols
-- =========================
INSERT INTO rols (id, nombre, created_at, updated_at) VALUES
(1, 'Administrador', '2026-05-15 08:00:00', '2026-05-15 08:00:00'),
(2, 'Cliente', '2026-05-15 08:00:00', '2026-05-15 08:00:00');

-- =========================
-- INSERTS: users
-- =========================
INSERT INTO users (id, name, email, email_verified_at, password, rol_id, remember_token, created_at, updated_at) VALUES
(1, 'Juan Pérez', 'juan@example.com', '2026-05-15 08:05:00', '$2y$12$scy/bCuiLKCuSzcRXNv0neWKPSKDkNWldIvqFJ8JAEW92Iycd9Vqi', 1, NULL, '2026-05-15 08:05:00', '2026-05-15 08:05:00'),
(2, 'María López', 'maria@example.com', '2026-05-15 08:05:00', '$2y$12$scy/bCuiLKCuSzcRXNv0neWKPSKDkNWldIvqFJ8JAEW92Iycd9Vqi', 2, NULL, '2026-05-15 08:05:00', '2026-05-15 08:05:00'),
(3, 'Carlos Ramírez', 'carlos@example.com', '2026-05-15 08:05:00', '$2y$12$scy/bCuiLKCuSzcRXNv0neWKPSKDkNWldIvqFJ8JAEW92Iycd9Vqi', 2, NULL, '2026-05-15 08:05:00', '2026-05-15 08:05:00');

-- =========================
-- INSERTS: categorias
-- =========================
INSERT INTO categorias (id, nombre, created_at, updated_at) VALUES
(1, 'Acción', '2026-05-15 08:10:00', '2026-05-15 08:10:00'),
(2, 'Aventura', '2026-05-15 08:10:00', '2026-05-15 08:10:00'),
(3, 'Deportes', '2026-05-15 08:10:00', '2026-05-15 08:10:00'),
(4, 'RPG', '2026-05-15 08:10:00', '2026-05-15 08:10:00'),
(5, 'Shooter', '2026-05-15 08:10:00', '2026-05-15 08:10:00');

-- =========================
-- INSERTS: metodos_pagos
-- =========================
INSERT INTO metodos_pagos (id, nombre, created_at, updated_at) VALUES
(1, 'Tarjeta Crédito', '2026-05-15 08:20:00', '2026-05-15 08:20:00'),
(2, 'PayPal', '2026-05-15 08:20:00', '2026-05-15 08:20:00'),
(3, 'Transferencia', '2026-05-15 08:20:00', '2026-05-15 08:20:00');

-- =========================
-- INSERTS: videojuegos
-- =========================
INSERT INTO videojuegos 
(id, nombre, descripcion, cantidad, vigente, requisitos_de_sistema, calificacion, precio_unitario, valor_total, categoria_id, created_at, updated_at) 
VALUES
(1, 'FIFA 25', 'Juego de fútbol', 10, true, '8GB RAM, GTX 1050', 4.5, 59.99, 599.90, 3, '2026-05-15 08:30:00', '2026-05-15 08:30:00'),

(2, 'Call of Duty MW3', 'Shooter de guerra', 8, true, '16GB RAM, RTX 2060', 4.7, 69.99, 559.92, 5, '2026-05-15 08:30:00', '2026-05-15 08:30:00'),

(3, 'The Witcher 3', 'RPG mundo abierto', 5, true, '8GB RAM, GTX 1060', 4.9, 39.99, 199.95, 4, '2026-05-15 08:30:00', '2026-05-15 08:30:00'),

(4, 'Minecraft', 'Sandbox y construcción', 12, true, '4GB RAM', 4.8, 29.99, 359.88, 2, '2026-05-15 08:30:00', '2026-05-15 08:30:00'),

(5, 'GTA V', 'Acción y aventura', 7, true, '8GB RAM, GTX 1050 Ti', 4.8, 49.99, 349.93, 1, '2026-05-15 08:30:00', '2026-05-15 08:30:00');

-- =========================
-- INSERTS: compras
-- =========================
INSERT INTO compras 
(id, fecha_entrega, direccion_envio, estado, metodo_pago_id, user_id, created_at, updated_at) 
VALUES
(1,  '2026-05-20', 'San Miguel, Colonia El Molino', true, 1, 1, '2026-05-15 09:00:00', '2026-05-15 09:00:00'),
(2,  '2026-05-21', 'Usulután, Barrio La Parroquia', false, 2, 2, '2026-05-15 09:05:00', '2026-05-15 09:05:00'),
(3,  '2026-05-22', 'La Unión, Centro', 'Entregado', true, 3, '2026-05-15 09:10:00', '2026-05-15 09:10:00');

-- =========================
-- INSERTS: detalles_compras
-- =========================
INSERT INTO detalles_compras
(id, compra_id, videojuego_id, cantidad, subTotal, precio_venta, porcentajeIva, iva, total, created_at, updated_at)
VALUES
(1, 1, 1, 1, 53.09, 59.99, 13.00, 6.90, 59.99, '2026-05-15 09:20:00', '2026-05-15 09:20:00'),
(2, 2, 2, 1, 61.94, 69.99, 13.00, 8.05, 69.99, '2026-05-15 09:20:00', '2026-05-15 09:20:00'),
(3, 2, 4, 2, 53.08, 29.99, 13.00, 6.90, 59.98, '2026-05-15 09:20:00', '2026-05-15 09:20:00'),
(4, 3, 3, 1, 35.39, 39.99, 13.00, 4.60, 39.99, '2026-05-15 09:20:00', '2026-05-15 09:20:00');