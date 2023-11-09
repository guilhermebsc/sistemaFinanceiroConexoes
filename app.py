import psycopg2
import time
import xlwings as xw


wb = xw.Book('dados.xlsx')
corretoras = {}
while True:
    for x in range(23,27):
        valor = wb.sheets['Planilha2'].range("B"+str(x)).value
        corretoras[wb.sheets['Planilha2'].range('A'+str(x)).value] = valor
        #corretora[banco] = valor
    # Conectando ao banco de dados PostgreSQL
    conn = psycopg2.connect(
        dbname="meu_banco_de_dados",
        user="meu_usuario",
        password="1234",
        host="10.0.0.104"
    )

    # Criar um cursor
    cur = conn.cursor()
    
    for item in corretoras.keys():
        cur.execute(f"INSERT INTO tabela_moedas (moeda, valor) VALUES ('{item}', '{corretoras[item]}') ON CONFLICT (moeda) DO UPDATE SET valor = EXCLUDED.valor;")
    # Commit das alterações
    conn.commit()

    # Fechar a conexão
    cur.close()
    conn.close()
    time.sleep(1)