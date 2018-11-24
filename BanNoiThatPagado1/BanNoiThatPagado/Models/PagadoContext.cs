using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;

namespace BanNoiThatPagado.Models
{
    public class PagadoContext : DbContext
    {
        public PagadoContext()
        {
        }

        public PagadoContext(DbContextOptions<PagadoContext> options) : base(options) { }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                //warning To protect potentially sensitive information in your connection string, you should move it out of source code. See http://go.microsoft.com/fwlink/?LinkId=723263 for guidance on storing connection strings.
                optionsBuilder.UseSqlServer(@"Server=DESKTOP-7V6S9MU\NGOCTHAO;Database=BanNoiThatPagado;Trusted_Connection =True;");
            }
        }

        public DbSet<SanPham> SanPham { get; set; }
        public DbSet<GioHang> GioHang { get; set; }
    }
}
