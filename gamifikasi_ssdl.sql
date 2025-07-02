
-- DATABASE: gamifikasi_ssdl

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS levels;
CREATE TABLE levels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO levels (name) VALUES 
('Beginner'),
('Advance');

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    level_id INT,
    question_text TEXT,
    FOREIGN KEY (level_id) REFERENCES levels(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS answers;
CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    answer_text TEXT,
    is_correct BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS scores;
CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    level_id INT,
    score INT,
    taken_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (level_id) REFERENCES levels(id) ON DELETE CASCADE
);

-- Contoh soal Beginner
INSERT INTO questions (level_id, question_text) VALUES
(1, 'Apa tujuan dari project inspection dalam SDLC?'),
(1, 'Apa yang dimaksud dengan threat modeling dalam konteks keamanan?'),
(1, 'Mengapa penting mendokumentasikan persyaratan fungsional dan non-fungsional?'),
(1, 'Apa saja metodologi SDLC yang umum digunakan?'),
(1, 'Apa kelebihan pendekatan Agile dalam pengembangan perangkat lunak?');

-- Jawaban untuk soal-soal Beginner
INSERT INTO answers (question_id, answer_text, is_correct) VALUES
(1, 'Untuk memahami kebutuhan proyek dan risikonya.', TRUE),
(1, 'Untuk membuat laporan keuangan.', FALSE),
(1, 'Untuk menguji performa server.', FALSE),

(2, 'Model yang mengidentifikasi potensi ancaman dan kerentanan sistem.', TRUE),
(2, 'Diagram alir proses bisnis.', FALSE),
(2, 'Metode untuk debugging.', FALSE),

(3, 'Agar semua pihak memahami ekspektasi sistem.', TRUE),
(3, 'Untuk menghindari pembuatan user manual.', FALSE),
(3, 'Agar pengujian bisa diabaikan.', FALSE),

(4, 'Waterfall, Agile, Spiral, DevOps.', TRUE),
(4, 'Cascading, Rapid Flow, XP.', FALSE),
(4, 'PHP, Python, Java.', FALSE),

(5, 'Adaptif terhadap perubahan dan iteratif.', TRUE),
(5, 'Tidak membutuhkan dokumentasi.', FALSE),
(5, 'Menghilangkan fase pengujian.', FALSE);

-- Contoh soal Advance
INSERT INTO questions (level_id, question_text) VALUES
(2, 'Apa peran security advisor dalam SDLC?'),
(2, 'Apa perbedaan pendekatan keamanan antara Waterfall dan Agile?'),
(2, 'Mengapa DevSecOps cocok untuk proyek dengan kebutuhan rilis cepat dan aman?'),
(2, 'Apa itu penetration testing dan kapan dilakukan dalam SDLC?'),
(2, 'Sebutkan contoh praktik keamanan pada fase deployment.');

-- Jawaban untuk soal-soal Advance
INSERT INTO answers (question_id, answer_text, is_correct) VALUES
(6, 'Membantu mengidentifikasi dan mengatasi risiko keamanan.', TRUE),
(6, 'Menulis dokumen marketing.', FALSE),
(6, 'Mengatur anggaran tim.', FALSE),

(7, 'Waterfall di akhir, Agile di tiap iterasi.', TRUE),
(7, 'Waterfall aman, Agile tidak.', FALSE),
(7, 'Agile tanpa keamanan.', FALSE),

(8, 'Karena integrasi otomatis keamanan di pipeline CI/CD.', TRUE),
(8, 'Karena tidak perlu testing manual.', FALSE),
(8, 'Agar lebih lambat dalam deployment.', FALSE),

(9, 'Tes simulasi serangan, dilakukan sebelum deployment.', TRUE),
(9, 'Tes fungsi email.', FALSE),
(9, 'Tes warna tampilan.', FALSE),

(10, 'Hardening server, firewall, dan audit konfigurasi.', TRUE),
(10, 'Upload ke server tanpa enkripsi.', FALSE),
(10, 'Menonaktifkan password.', FALSE);
