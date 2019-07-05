#Script para consumir API
#Linguagem utilizada : Python3
#Created by Jhonatas Rodrigues
#

import requests
import json
import os

# Request Area
# Menu Area
os.system('clear')
print("--> Bem vindo ao apipy 1.0 <--")
def menu(first=False):
        if not first:
            print("pressione qualquer tecla ...")
            input()
            os.system('clear')
        print( "(Menu)")
        print( ">> Use (1) Para Ver pergunta")
        print( ">> Use (2) Para Inserir pergunta")
        print( ">> Use (3) Para Atualizar pergunta")
        print( ">> Use (4) Para Deletar pergunta")
        print( ">> Use (0) Para Abortar :/")
        valor = input('Resposta :')

        if valor == '1':
            os.system('clear')
            print("loading...")
            data = requests.get('http://localhost:8000/api/pergunta')
            binary = data.content
            output = json.loads(binary)
            os.system('clear')
            x = 0
            print("-----pergunta{s} encontrado{s}-----\n".format(s='s' if len(output['data']) > 1 else ''))
            for item in output['data']:
                print('>> Id:',item['id'],'\n>> Tipo_de_pergunta: ', item['tipo'], '\n>>')
                print("\n=====================================================================================================\n")
            menu()

        elif valor == '2' :
            os.system('clear')
            nome = input('Digite a pergunta :')
            tipo = input('Digite o form do pergunta :')
            requests.post('http://localhost:8000/api/pergunta/', data = { 'tipo':tipo})
            menu()
            
        elif valor == '3':
            os.system('clear')
            identifier = input('Digite o ID do pergunta Que Você Deseja Alterar : ')
            nameN = input('Nova Pergunta : ')
            tipo = input('Novo Titulo : ')
            idade_indicativaN = input('Novo tipo de pergunta: ')
            requests.put('http://localhost:8000/api/pergunta' + identifier , data = {'id': identifier, 'titulo':nameN, 'form_id': tipo, })
            menu()

        elif valor == '4':
            os.system('clear')
            print(" >> Use (1) Deletar Apenas Um pergunta")
            print(" >> Use (2) Para Deletar Todos os pergunta")
            print(" >> Use (0) Para Retornar ao Menu")
            resposta = input("Resposta :")
            if resposta == '1':
                gameId = input('Digite o Id do pergunta :')
                requests.delete('http://localhost:8000/api/pergunta' + gameId)
            elif resposta == '2':
                requests.delete('http://localhost:8000/api/pergunta')
            else :
                menu()

        else :
            print("Byeeeeeee   '-' ")

menu(True)